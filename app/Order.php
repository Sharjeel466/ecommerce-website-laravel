<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\OrderDetails;
use App\Product;

class Order extends Model
{
    protected $fillable = ['user_id', 'date', 'payment_method', 'total_amount'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}