<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    protected $table = 'order_items';

    protected $fillable = ['order_id','product_id','name','qty','price','total'];

    use HasFactory;
}
