<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['customer_id', 'product_id', 'product_qty'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
