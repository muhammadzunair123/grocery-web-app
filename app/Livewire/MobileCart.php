<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class MobileCart extends Component
{
    #[On('decrement-item')]
    #[On('increment-item')]
    #[On('added-to-cart')]
    public function render()
    {

        $cartContent = Cart::content();

        return view('livewire.mobile-cart',compact('cartContent'));
    }
}
