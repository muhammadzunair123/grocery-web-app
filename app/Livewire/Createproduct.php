<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class Createproduct extends Component
{

    use WithFileUploads;

    public $title;
    public $slug;
    public $description;
    public $price;
    public $compare_price;
    public $brand_id;
    public $is_featured;
    public $sku;
    public $barcode;
    public $track_qty;
    public $finalImagePathName;
    public $images;
    public $qty;
    public $status;

    public $categoryid;

    public $subcategory_id;

    public function updatedCategoryId (){
        $this->subcategory_id = null;
    }

    #[Computed()]
    public function categories (){
        return Category::all();
    }

    #[Computed()]
    public function subcategories () {
        return SubCategory::where('category_id',$this->categoryid)->get();
    }

    #[Computed()]
    public function brands () {
        return Brand::all();
    }

    public function CreateProduct () {

        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'sku' => 'required|unique:products',
            'categoryid' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
            'images.*' => 'image|max:2048',
        ];

        if(!empty($this->track_qty) && $this->track_qty === true ){
            $rules['qty'] = 'required|numeric';
        }else{
            $this->qty = null;
        }

        $this->validate($rules);


        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'compare_price' => $this->compare_price,
            'category_id' => $this->categoryid,
            'subcategory_id' => $this->subcategory_id,
            'brand_id' => $this->brand_id,
            'is_featured' => $this->is_featured,
            'sku' => $this->sku,
            'barcode' => $this->barcode,
            'track_qty' => $this->track_qty,
            'qty' => $this->qty,
            'status' => $this->status,
        ];

        $product = Product::create($data);

        if($this->images){

            foreach($this->images as $image){

                $uploadPath = 'uploads/products';

                $extension = $image->getClientOriginalExtension();

                $fileName = time() . rand(0, 100) . '.' . $extension;

                $this->finalImagePathName = Storage::disk('public')->putFileAs($uploadPath, $image, $fileName);

                if(!($this->finalImagePathName)){
                    $this->finalImagePathName= null;
                }


                $data2 = [
                    'product_id' => $product->id,
                    'image' => $this->finalImagePathName,
                    'sort_order' => null,
                ];


                $productImage = ProductImage::create($data2);
            }

        }


        session()->flash('success', 'Product Created Successfully');
        return $this->redirect(route('admin.product'), navigate: true);


    }


    public function render()
    {
        return view('livewire.createproduct')->layout('admin.layout.app')->title('Create Product');
    }
}
