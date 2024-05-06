<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Validation\Rule;


class Updatebrand extends Component
{

    public $id;
    public $name;
    public $slug;
    public $status;

    public function mount($id)
    {

        $brands = Brand::find($id);

        $this->id = $brands->id;
        $this->name = $brands->name;
        $this->slug = $brands->slug;
        $this->status = $brands->status;

    }

    public function updateBrand () {

        $this->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('brands')->ignore($this->id)],
        ]);

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
        ];

        Brand::where('id',$this->id)->update($data);

        session()->flash('success', 'Brand Updated Successfully');
        return $this->redirect(route('admin.brand'), navigate: true);

    }

    public function render()
    {
        return view('livewire.updatebrand')->layout('admin.layout.app')->title('Update Brands');
    }
}
