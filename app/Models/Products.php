<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productcategory (){
        return $this->belongsTo('App\Models\ProductCategory','product_category_id');
    }


}
