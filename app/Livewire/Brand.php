<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand as BrandModel;

class Brand extends Component
{

    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';

    public function deleteCategory($id){

        $brand =  BrandModel::find($id);

        $brand->delete();

        session()->flash('danger', 'Brand Deleted Successfully');

    }

    public function render()
    {

        $brands =  BrandModel::latest('id')->where('name','like',"%{$this->search}%")->orWhere('slug','like',"%{$this->search}%")->paginate(8);

        return view('livewire.brand',compact('brands'))->layout('admin.layout.app')->title('Brands');
    }
}
