<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product (){
        return $this->hasMany('App\Models\Product');
    }
    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }
}
