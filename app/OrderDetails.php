<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['order_id', 'product_id', 'product_qty'];

    // public function customer()
    // {
    //     return $this->belongsTo('App\Customer');
    // }

    public function orderDetail()
    {
        return $this->hasMany('App\OrderDetails');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}