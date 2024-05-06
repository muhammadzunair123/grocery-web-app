<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel ;
use Livewire\WithPagination;

class Product extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    public function render()
    {

        $products = ProductModel::latest('id')->with('ProductImages')->where('title','like',"%{$this->search}%")->orWhere('slug','like',"%{$this->search}%")->paginate(8);

        return view('livewire.product',compact('products'))->layout('admin.layout.app')->title('PRODUCTS');
    }

    public function deleteProduct($id){

        $category =  ProductModel::find($id);

        $category->delete();

        session()->flash('success', 'Sub-Category Deleted Sucessfully');

    }
}
