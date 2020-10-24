<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;

class ProdukDetailController extends Controller
{
    public function index($id)
    {
        $product = Products::with(['productcategory'])->where('id',$id)->first();
        $product_category = ProductCategory::get();
        return view('Client.product-detail',compact('product','product_category'));
    }
}
