<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'product_qty'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
