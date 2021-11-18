<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderDetails;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = ['user_id', 'date', 'payment_method', 'total_amount'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}