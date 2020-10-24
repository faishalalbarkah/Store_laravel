<?php

namespace App\Http\Controllers\Client;

use App\Models\Products;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class PromotionDetailController extends Controller
{
    public function index($id)
    {
        $products = Products::orderBy("created_at","desc")->paginate(3);
        $promotion = Promotion::find($id);
        $product_categorys = ProductCategory::get();
        return view('Client.blog-detail',compact('promotion','products','product_categorys'));
    }
}
