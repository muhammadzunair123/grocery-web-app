<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAdress extends Model
{

    protected $table = 'customer_addresses';

    protected $fillable = ['user_id','first_name','last_name','email','apartment','phone','address','city','zip_code','notes'];

    use HasFactory;
}
