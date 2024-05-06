<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Allcategories extends Component
{
    public function render()
    {

        $categories = Category::latest('id')->get();

        return view('livewire.allcategories',compact('categories'))->layout('front.layout.app')->title('All Categories');
    }
}
