<?php

namespace App\Http\Controllers\Client;

use App\Models\Products;
use App\Models\Transaction;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProdukDetailController extends Controller
{
    public function index($id)
    {
        $product = Products::with(['productcategory'])->where('id', $id)->first();
        $product_category = ProductCategory::get();
        return view('Client.product-detail', compact('product', 'product_category'));
    }

    public function addToCart(Request $request)
    {


        if ($request->product_id) {
            $product = Products::where('id', $request->product_id)->first();

            if ($product->stock > 0) {

                $cart = Cart::session(request()->customer_id)->get('P' . $request->product_id);

                if ($cart && $product->stock <= $cart->quantity) {
                    return back()->with('error', 'Jumlah quantity untuk produk ' . $product->name . 'melebihi stock');
                } else {
                    //format array
                    Cart::session($request->customer_id)->add(array(
                        'id' => 'P' . $product->id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'quantity' => 1,
                    ));
                    return back()->with('success', 'Berhasil Menambahkan Produk');
                }
            } else {
                return back()->with('error', 'Gagal!. Produk' . $product->name . ' Stok Kurang');
            }
        }
        return redirect('produk/cart/{customer_id}');
    }

    public function storecart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'customer_id' => 'required'
        ]);

        if(count(Cart::session(request()->customer_id)->getContent()) == 0){
            return back()->with('error','Keranjang masih kosong');
        }

        Transaction::create([
            'id' => $request->id,
            'product_id' => $request->product_id,
            'customer_id' => Auth::guard('customer')->user()->id,
            'description' => $request->description
        ]);

        return redirect('produk/cart/{customer_id}');
    }
}

