<?php

namespace App;
use App\Order;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name', 'email', 'password', 'address', 'phone_number'];

    public function order()
    {
        return $this->hasOne('App\Order');
    } 
}