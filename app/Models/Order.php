<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = ['user_id','subtotal','shipping','discount','coupon_code','grand_total','payment_status','status','shippped_date','first_name','last_name','email','phone','address','apartment','city','zip_code','notes'];


    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
