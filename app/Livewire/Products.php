<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Products extends Component
{

    public $categorySlug;
    public $quantity;
    public $productAlreadyExists;

    public function mount ($categorySlug = null) {
        if($categorySlug != null){
            $this->categorySlug = $categorySlug;
        }

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

            $newCartItem =  Cart::add($products->id, $products->title, $qty, $products->price, ['slug' => $products->slug, 'productImage' => (!empty($products->ProductImages)) ? $products->ProductImages->first() : '']);

        } else {



            // Update Cart Quantity

            $newCartItem =  Cart::add($products->id, $products->title, $qty, $products->price, ['slug' => $products->slug, 'productImage' => (!empty($products->ProductImages)) ? $products->ProductImages->first() : '']);

        }

          $this->dispatch('added-to-cart');

    }

    public function render()
    {

        $products = Product::latest('id');

        if(!empty($this->categorySlug)){
            $category = Category::where('slug',$this->categorySlug)->first();
            $products = $products->where('category_id',$category->id);
            $subcategories = SubCategory::where('category_id',$category->id)->get();
        }else{
            $subcategories = null;
            $category=null;
        }

        $products = $products->get();

        return view('livewire.products',compact('products','category','subcategories'))->layout('front.layout.app')->title('Products');
    }
}
