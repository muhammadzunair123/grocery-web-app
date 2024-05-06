<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\SubCategory;
use App\Models\Category;

class Updatesubcategory extends Component
{

    use WithFileUploads;

    public $id;
    public $name;
    public $slug;
    public $status;
    public $image;
    public $oldImage;
    public $category_id;

    public function mount($id)
    {

        $categories = Subcategory::find($id);

        $this->id = $categories->id;
        $this->name = $categories->name;
        $this->slug = $categories->slug;
        $this->status = $categories->status;
        $this->oldImage = $categories->image;
        $this->category_id = $categories->category_id;

    }

    public function updateSubCategory () {

        $this->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('subcategories')->ignore($this->id)],
            'image' => 'nullable|sometimes|image|max:1024',
            'category_id' => 'required',
        ]);

        $finalImagePathName = $this->oldImage;


        if ($this->image) {

            $uploadPath = 'uploads/subcategories';

            $extension = $this->image->getClientOriginalExtension();


            $fileName = time() . rand(0, 100) . '.' . $extension;


            $finalImagePathName = Storage::disk('public')->putFileAs($uploadPath, $this->image, $fileName);

        }

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'image' => $finalImagePathName,
            'category_id' => $this->category_id,
        ];


        SubCategory::where('id',$this->id)->update($data);

        session()->flash('success', 'Sub-Category Updated Successfully');
        return $this->redirect(route('admin.subcategory'), navigate: true);

    }

    public function destroy_Image()
    {

        $product = SubCategory::findorfail($this->id);

        $image = 'storage/'.$product->image;

        if (File::exists($image)) {

            File::delete($image);

            SubCategory::where('id',$this->id)->update(['image' => null]);

            $this->image = null;

        }

        return $this->redirect(route('admin.update-subcategory',$this->id));


    }


    public function render()
    {

        $categories = Category::all();

        return view('livewire.updatesubcategory',compact('categories'))->layout('admin.layout.app')->title('Update SubCategory');
    }
}
