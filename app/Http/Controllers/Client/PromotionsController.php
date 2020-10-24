<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Products;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    public function index()
    {

        $products = Products::orderBy("created_at","desc")->paginate(3);
        $promotions = Promotion::orderBy("created_at","desc")->paginate(5);
        $product_categorys = ProductCategory::get();
        return view('Client.blog',compact('promotions','product_categorys','products'));
    }
}
