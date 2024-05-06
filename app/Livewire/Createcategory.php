<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Createcategory extends Component
{

    use WithFileUploads;

    public $name;

    public $finalImagePathName;
    public $slug;
    public $status;
    public $image;

    public function createCategory()
    {

       $this->validate([
        'name' => 'required',
        'slug' => 'required|unique:categories',
        'image' => 'nullable|sometimes|image|max:1024'
       ]);


        if ($this->image) {

            $uploadPath = 'uploads/categories';

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
        ];

        Category::create($data);

        session()->flash('success', 'Category Created Successfully');
        return $this->redirect(route('admin.category'), navigate: true);

    }

    // if ($request->hasFile('image')) {

    //     $uploadPath = 'uploads/products/';

    //     // foreach($request->file('image') as $imageFile){


    //     $imageFile = $request->file('image');

    //     foreach ($request->file('image') as $imageFile) {

    //         $extension = $imageFile->getClientOriginalExtension();
    //         $fileName = time().rand(0,100).'.'. $extension;
    //         $imageFile->move($uploadPath, $fileName);
    //         $finalImagePathName = $uploadPath . $fileName;

    //         $data2 = [
    //             'product_id' => $product->id,
    //             'image' => $finalImagePathName,
    //         ];

    //         $productImage = ProductImage::create($data2);
    //     }


    // }

    public function refresh()
    {
        return;
    }

    public function render()
    {
        return view('livewire.createcategory')->layout('admin.layout.app')->title('Create Category');
    }
}
