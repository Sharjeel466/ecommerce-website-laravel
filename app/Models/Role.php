<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
