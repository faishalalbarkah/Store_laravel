<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use App\Models\Products;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart (Request $request)
    {
        $transaksion = Transaction::where('id', $request->customer_id)->first();
        return view('Client.shoping-cart', compact('transaksion'));
    }


}
