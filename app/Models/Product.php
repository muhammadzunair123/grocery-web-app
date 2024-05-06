<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{

    protected $fillable = ['title','slug','description','price','compare_price','category_id','subcategory_id','brand_id','is_featured','sku','barcode','track_qty','qty','status'];

    public function ProductImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    use HasFactory;
}
