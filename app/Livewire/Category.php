<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category as CategoryModel ;
use Livewire\WithPagination;

class Category extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function deleteCategory($id){

        $category =  CategoryModel::find($id);

        $category->delete();

        session()->flash('success', 'Category Deleted Sucessfully');

    }

    public function render()
    {

        $categories = CategoryModel::latest('id')->where('name','like',"%{$this->search}%")->orWhere('slug','like',"%{$this->search}%")->paginate(8);

        return view('livewire.category',compact('categories'))->layout('admin.layout.app')->title('Category');
    }
}
