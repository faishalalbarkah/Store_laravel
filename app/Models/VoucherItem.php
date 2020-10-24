<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function voucher() {
        return $this->belongsTo('App\Models\Voucher');
    }
    public function Produk(){
        return $this->belongsTo('App\Models\Products');
    }
}
