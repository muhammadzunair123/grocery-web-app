<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\CustomerAdress;

class Checkout extends Component
{

    public $email;
    public $first_name;
    public $last_name;
    public $editingUserId;
    public $city;
    public $zip_code;
    public $address;
    public $apartment;
    public $notes;
    public $data;
    public $mobile;


    public function mount()
    {

        $this->first_name = Auth::user()->name;
        $this->last_name = Auth::user()->last_name;
        $this->email = Auth::user()->email;
        if(CustomerAdress::where('user_id',Auth::user()->id)->first()){
            $this->mobile = CustomerAdress::where('user_id',Auth::user()->id)->first()->phone;
        }

        if (Cart::count() == 0) {
            return redirect()->route('home');
        }
        if (Auth::check() == false) {

            if (!session()->has('url.intended')) {
                session(['url.intended' => url()->current()]);
            }

            return redirect()->route('home');
        }

    }

    public function EditCustomerAddress($UserId)
    {

        $this->editingUserId = $UserId;
        $this->data = CustomerAdress::where('user_id', $UserId)->first();

        if ($this->data) {
            $this->city = $this->data->city;
            $this->zip_code = $this->data->zip_code;
            $this->address = $this->data->address;
            $this->apartment = $this->data->apartment;
            $this->notes = $this->data->notes;
        }

    }

    public function update()
    {

        $this->validate([
            'city' => 'required',
            'zip_code' => 'required|numeric',
            'address' => 'required|min:10',
        ]);

        $user = Auth::user();

        CustomerAdress::updateOrCreate(
            ['user_id' => $user->id],
            [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'address' => $this->address,
                'apartment' => $this->apartment,
                'city' => $this->city,
                'zip_code' => $this->zip_code,
                'notes' => $this->notes,
            ]
        );

        $this->reset(['editingUserId', 'city', 'zip_code', 'address', 'apartment', 'notes']);

        session()->flash('success', 'The address has been updated');

    }

    public function placeOrder()
    {

        $this->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'mobile' => 'required|min:11',
        ]);

        // Get the subtotal without taxes and fees from the cart
        $subtotal = Cart::subtotal(2, '.', '');

        // Determine the amount to add based on the subtotal
        $shipping = $subtotal > 0 && $subtotal < 3000 ? 80 : 0;

        // Convert the subtotal to a float and add the calculated amount
        $modifiedSubtotal = floatval($subtotal) + $shipping;

        $grandtotal = $modifiedSubtotal;

        $user = Auth::user();

        $CustomerAdress = CustomerAdress::where('user_id', $user->id)->first();

        if (!empty($CustomerAdress)) {


            $this->reset(['editingUserId', 'city', 'zip_code', 'address', 'apartment', 'notes']);

            User::where('id',$user->id)->update([
                'name' => $this->first_name,
                'last_name' => $this->last_name,
            ]);

            CustomerAdress::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $this->mobile,
                ]
            );

            $data = [
                'user_id' => $user->id,
                'subtotal' => $subtotal,
                'shipping' => $shipping,
                'grand_total' => $grandtotal,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->mobile,
                'address' => $CustomerAdress->address,
                'city' => $CustomerAdress->city,
                'zip_code' => $CustomerAdress->zip_code,
                'apartment' => $CustomerAdress->apartment,
                'notes' => $CustomerAdress->notes,
            ];


            $order = Order::create($data);

            foreach (Cart::content() as $item) {

                $data2 = [
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'name' => $item->name,
                    'qty' => $item->qty,
                    'price' => $item->price,
                    'total' => $item->qty * $item->price,
                ];

                $productData = Product::find($item->id);

                if ($productData->track_qty == 1) {
                    $currentQty = $productData->qty;
                    $updatedQty = $currentQty - $item->qty;
                    $productData->qty = $updatedQty;
                    $productData->save();
                }

                $orderPlaced = OrderItem::create($data2);

                Cart::destroy();

            }

            orderEmail($order->id);

            orderEmail($order->id,'admin');

            $orderid = $order->id;
            $current = strtotime($order->created_at);
            $currentdate = date('M d, Y', $current);
            $grandtotal = $order->grand_total;


            return redirect()->route('thanks')->with('variables', ['orderid' => $orderid, 'currentdate' => $currentdate, 'grandtotal' => $grandtotal]);

            // return Redirect::route('thanks', ['orderid' => $orderid,'currentdate' => $currentdate, 'grandtotal' => $grandtotal]);

        } else {
            $this->EditCustomerAddress($user->id);
            $this->update();
        }

    }

    public function thanks()
    {
        $orderId = 25;

    }




    public function render()
    {

        $customerAddress = CustomerAdress::where('user_id', Auth::user()->id)->first();

        $cartContent = Cart::content();

        return view('livewire.checkout', compact('cartContent', 'customerAddress'))->layout('front.layout.app-sim')->title('Checkout');
    }
}
