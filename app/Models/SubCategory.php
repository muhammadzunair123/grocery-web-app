<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $table = 'subcategories';

    protected $fillable = ['name','slug','image','status','category_id'];

    use HasFactory;
}
