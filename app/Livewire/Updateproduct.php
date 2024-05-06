<?php

namespace App\Livewire;

use App\Models\ProductImage;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;

class Updateproduct extends Component
{

    public $id;
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
    public $oldImages;
    public $status;

    public $categoryid;

    public $subcategory_id;

    use WithFileUploads;

    public function mount($id)
    {

        $products = Product::find($id);

        $this->id = $products->id;
        $this->title = $products->title;
        $this->slug = $products->slug;
        $this->description = $products->description;
        $this->price = $products->price;
        $this->compare_price = $products->compare_price;
        $this->sku = $products->sku;
        $this->barcode = $products->barcode;
        $this->track_qty = $products->track_qty;
        $this->qty = $products->qty;
        $this->status = $products->status;
        $this->categoryid = $products->category_id;
        $this->subcategory_id = $products->subcategory_id;
        $this->brand_id = $products->brand_id;
        $this->is_featured = $products->is_featured;

        $this->oldImages = ProductImage::where('product_id',$this->id)->get();
    }

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
    public function updateProduct () {

        $rules = [
            'title' => 'required',
            'slug' => ['required', Rule::unique('products')->ignore($this->id)],
            'price' => 'required|numeric',
            'compare_price' => 'numeric',
            'sku' => ['required', Rule::unique('products')->ignore($this->id)],
            'categoryid' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
            'images.*' => 'image|max:2048',
        ];

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


        $product = Product::where('id',$this->id)->update($data);

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
                    'product_id' => $this->id,
                    'image' => $this->finalImagePathName,
                    'sort_order' => null,
                ];


                $productImage = ProductImage::create($data2);
            }

        }


        session()->flash('success', 'Product Updated Successfully');
        return $this->redirect(route('admin.product'), navigate: true);




    }

    public function destroy_Image($imageId)
    {

        $product = Product::findorfail($this->id);

        $image = 'storage/' . $product->image;

        if (File::exists($image)) {

            File::delete($image);

            ProductImage::where('id', $imageId)->delete();

            $this->image = null;

        }

        $redirectUrl = route('admin.update-product', $this->id).'#MainImageSection';

        // return $this->redirect($redirectUrl);

        return $this->redirect(route('admin.update-product', $this->id));


    }


    public function render()
    {


        return view('livewire.updateproduct')->layout('admin.layout.app')->title('Update Product');
    }
}
