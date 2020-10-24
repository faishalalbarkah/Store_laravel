<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Products;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product_categorys = ProductCategory::orderBy("created_at","desc")->get();
        $products = Products::orderBy("created_at","desc")->get();

        return view('Client.index',compact('product_categorys','products'));
    }
}
