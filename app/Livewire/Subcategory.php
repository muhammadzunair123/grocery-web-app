<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubCategory as SubCategoryModel;
use Livewire\WithPagination;

class Subcategory extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';

    public function deleteSubCategory($id){

        $subcategory =  SubCategoryModel::find($id);

        $subcategory->delete();

        session()->flash('success', 'Sub-Category Deleted Sucessfully');

    }
    public function render()
    {

        $subcategories = SubCategoryModel::select('subcategories.*','categories.name as categoryName')
                        ->leftJoin('categories','categories.id','subcategories.category_id')->where('subcategories.name','like',"%{$this->search}%")->orWhere('subcategories.slug','like',"%{$this->search}%")->paginate(8);

        // $subcategories = SubCategoryModel::latest()->where('name','like',"%{$this->search}%")->paginate(8);

        return view('livewire.subcategory',compact('subcategories'))->layout('admin.layout.app')->title('SubCategory');
    }
}
