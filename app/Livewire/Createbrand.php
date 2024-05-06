<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;


class Createbrand extends Component
{


    public $name;
    public $slug;
    public $status;

    public function createBrand()
    {

        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands',
        ]);

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
        ];

        Brand::create($data);

        session()->flash('success', 'Brand Created Successfully');
        return $this->redirect(route('admin.brand'), navigate: true);

    }

    public function render()
    {
        return view('livewire.createbrand')->layout('admin.layout.app')->title('Create Brands');
    }
}
