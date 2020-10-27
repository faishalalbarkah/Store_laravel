<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function checkout()
    {
        return $this->belongsTo('App\Models\Checkout');
    }

    public function cart()
    {
        return $this->belongsTo('App\Models\Transaction');
    }
}
