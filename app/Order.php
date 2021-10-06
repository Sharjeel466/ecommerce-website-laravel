<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\OrderDetails;
use App\Product;

class Order extends Model
{
    protected $fillable = ['customer_id', 'date', 'payment_method', 'total_amount'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}