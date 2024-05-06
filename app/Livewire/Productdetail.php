<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\Attributes\On;


class Productdetail extends Component
{

    public $slug;
    public $quantity;
    public $productAlreadyExists;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function decrementQuantity($rowId){

        $cartItem = Cart::get($rowId);

        $cartItemQty = $cartItem->qty;

        $product = Product::find($cartItem->id);

        $productQty = $product->qty;

        $cartItemQty--;

        if ($product->track_qty == 'Yes') {

            if ($cartItemQty <= $productQty) {

                Cart::update($rowId, $cartItemQty);

            }
            else{
                // Product not availabe in stock
                dd('Product not available in stock');
            }

        }
        else{
            Cart::update($rowId, $cartItemQty);
        }

        $this->dispatch('decrement-item');

    }

    public function incrementQuantity($rowId){

        $cartItem = Cart::get($rowId);

        $cartItemQty = $cartItem->qty;

        $product = Product::find($cartItem->id);

        $productQty = $product->qty;

        $cartItemQty++;

        if ($product->track_qty == 'Yes') {

            if ($cartItemQty <= $productQty) {

                Cart::update($rowId, $cartItemQty);

            }
            else{
                // Product not availabe in stock
                dd('Product not available in stock');
            }

        }
        else{
            Cart::update($rowId, $cartItemQty);
        }

        $this->dispatch('increment-item');

    }

    public function addToCart($id)
    {

        $products = Product::with('ProductImages')->find($id);

        if ($this->quantity != null) {
            $qty = $this->quantity;
        } else {
            $qty = 1;
        }

        $cartContent = Cart::content();
        $productAlreadyExists = false;

        foreach ($cartContent as $item) {
            if ($item->id == $products->id) {
                $productAlreadyExists = true;
            }
        }

        if ($productAlreadyExists == false) {

            Cart::add($products->id, $products->title, $qty, $products->price, ['slug' => $products->slug, 'productImage' => (!empty($products->ProductImages)) ? $products->ProductImages->first() : '']);

        } else {



            // Update Cart Quantity

            Cart::add($products->id, $products->title, $qty, $products->price, ['slug' => $products->slug, 'productImage' => (!empty($products->ProductImages)) ? $products->ProductImages->first() : '']);

        }

        $this->dispatch('added-to-cart');

    }

    // public function cartContent(){

    //     $product = Product::where('slug', $this->slug)->with('ProductImages')->first();

    //     $cartContent = Cart::content();

    //     foreach($cartContent as $item){
    //         if($product->id === $item->id){
    //             $productExistance= true;
    //             $cartItem = Cart::get($item->rowId);
    //         }
    //     }

    // }

    #[On('decrement-item')]
    #[On('increment-item')]
    #[On('added-to-cart')]

    public function render()
    {

        $product = Product::where('slug', $this->slug)->with('ProductImages')->first();

        $rowId = null;

        $cartContent = Cart::content();
        $productExistance = false;

        foreach ($cartContent as $item) {
            if ($item->id == $product->id) {
                $productExistance = true;
                $rowId = $item->rowId;
                break;
            }else{
                $rowId= null;
            }
        }

        if($rowId !=null){
            $cartItem = Cart::get($rowId);
        }else{
            $cartItem = null;
        }


        $productCategory = Category::where('id', $product->category_id)->first();

        $productSubCategory = SubCategory::where('id', $product->subcategory_id)->first();

        $relatedProducts = Product::orderBy('id', 'DESC')->where('category_id', $productCategory->id)->where('status', '1')->with('ProductImages')->get();

        $peopleAlsoBoughtProducts = Product::latest('id')->where('status', 1)->take(16)->get();

        return view('livewire.productdetail', compact('product', 'productCategory', 'productSubCategory', 'relatedProducts', 'peopleAlsoBoughtProducts','productExistance','cartItem'))->layout('front.layout.app')->title('Product Detail');
    }
}
