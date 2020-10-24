<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $product_categorys = ProductCategory::get();
        $products = Products::get();
        return view('Client.product',compact('product_categorys','products'));
    }
}
