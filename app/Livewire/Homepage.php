<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


class Homepage extends Component
{

    public $quantity;
    public $productAlreadyExists;




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

        $products = Product::with('ProductImages')->find($id);


        // After adding to cart, emit an event to notify the blade file
        // $this->emit('productAddedToCart', $id);

        $this->dispatch('added-to-cart');

    }

    public function render()
    {

        $categories = Category::all();

        $products = Product::latest('id')->get();

        return view('livewire.homepage', compact('products', 'categories'))->layout('front.layout.app')->title('HOME');
    }
}
