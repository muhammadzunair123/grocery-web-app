<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Updatecategory extends Component
{

    use WithFileUploads;

    public $id;
    public $name;
    public $slug;
    public $status;
    public $image;
    public $oldImage;

    public function mount($id)
    {

        $categories = Category::find($id);

        $this->id = $categories->id;
        $this->name = $categories->name;
        $this->slug = $categories->slug;
        $this->status = $categories->status;
        $this->oldImage = $categories->image;

    }

    public function updateCategory()
    {

        $this->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories')->ignore($this->id)],
            'image' => 'nullable|sometimes|image|max:1024'
        ]);

        $finalImagePathName = $this->oldImage;

        if ($this->image) {

            $uploadPath = 'uploads/categories';

            $extension = $this->image->getClientOriginalExtension();


            $fileName = time() . rand(0, 100) . '.' . $extension;


            $finalImagePathName = Storage::disk('public')->putFileAs($uploadPath, $this->image, $fileName);

        }

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'image' => $finalImagePathName,
        ];

        Category::where('id', $this->id)->update($data);

        session()->flash('success', 'Category Updated Successfully');
        return $this->redirect(route('admin.category'), navigate: true);

    }

    public function destroy_Image()
    {

        $product = Category::findorfail($this->id);

        $image = 'storage/'.$product->image;

        if (File::exists($image)) {

            File::delete($image);

            Category::where('id',$this->id)->update(['image' => null]);

            $this->image = null;

        }

        return $this->redirect(route('admin.update-category',$this->id));


    }

    public function render()
    {

        return view('livewire.updatecategory')->layout('admin.layout.app')->title('Update Category');
    }
}
