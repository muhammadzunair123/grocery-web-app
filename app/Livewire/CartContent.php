<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;


class CartContent extends Component
{

    public function redirectToUrl($url)
    {
        return Redirect::to($url);
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

    #[On('decrement-item')]
    #[On('increment-item')]
    #[On('added-to-cart')]
    public function render()
    {

        $cartItems = Cart::content();

        $cartContent = $cartItems->reverse();

        return view('livewire.cart-content',compact('cartContent'));
    }
}
