<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function paymentmethod()
    {
        return $this->belongsTo('App/Models/Payments');
    }
}
