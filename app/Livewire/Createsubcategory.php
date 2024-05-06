<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Createsubcategory extends Component
{

    use WithFileUploads;
    public $name;
    public $slug;
    public $status;
    public $finalImagePathName;
    public $image;
    public $category_id;


    public function createSubCategory () {

        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:subcategories',
            'image' => 'nullable|sometimes|image|max:1024',
            'category_id' => 'required',
        ]);


        if ($this->image) {

            $uploadPath = 'uploads/subcategories';

            $extension = $this->image->getClientOriginalExtension();


            $fileName = time() . rand(0, 100) . '.' . $extension;


            $this->finalImagePathName = Storage::disk('public')->putFileAs($uploadPath, $this->image, $fileName);

        }

        if(!($this->finalImagePathName)){
            $this->finalImagePathName= null;
        }

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'image' => $this->finalImagePathName,
            'category_id' => $this->category_id,
        ];


        SubCategory::create($data);

        session()->flash('success', 'Sub-Category Created Successfully');
        return $this->redirect(route('admin.subcategory'), navigate: true);

    }
    public function render()
    {

        $categories = Category::all();

        return view('livewire.createsubcategory',compact('categories'))->layout('admin.layout.app')->title('Create SubCategory');
    }
}
