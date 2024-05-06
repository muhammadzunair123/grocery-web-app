<?php

namespace App\Livewire;

use App\Mail\OrderEmail;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;

class AdminOrderDetail extends Component
{

    public $status;
    public $userType;
    public $shipping_date;
    public $orderId;
    public function mount($orderId){
        $this->orderId = $orderId;

        $order = Order::where('id',$this->orderId)->first();

        if($order){
            $this->status = $order->status;
            $this->shipping_date = $order->shippped_date;
        }

    }

    public function updateOrderStatus(){

        if($this->shipping_date == ''){
            $this->shipping_date = null;
        }

        $data = [
            'status' => $this->status,
            'shippped_date' => $this->shipping_date,
        ];

        Order::where('id',$this->orderId)->update($data);


        session()->flash('success', 'Order Updated Successfully');

    }

    public function SendInvoiceEmail () {

        if($this->userType === null){
            $this->userType = 'customer';
        }

        OrderEmail($this->orderId,$this->userType);

        session()->flash('success', 'Email Sent To '.$this->userType.' Successfully');

    }

    public function render()
    {

        $order = Order::where('id',$this->orderId)->first();
        $orderItems = OrderItem::where('order_id',$this->orderId)->get();

        return view('livewire.admin-order-detail',compact('order','orderItems'))->layout('admin.layout.app')->title('Order Detail');
    }
}
