<?php

namespace App\Http\Controllers\Adminpanel;

use App\Models\Products;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_products = ProductCategory::get();
        $products = Products::paginate(15);
        return view('Adminpanel.produk.index', compact('products','category_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_products = ProductCategory::get();
        return view('Adminpanel.Produk.create', compact('category_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'product_category_id' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:5000'
        ]);

        $attributes = [
            'name' => $request->name,
            'price' => str_replace(",", "", $request->price),
            'product_category_id' => $request->product_category_id,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'description' => $request->description,
        ];
        if ($request->file('image')) {
            $uploadedFile = $request->file('image');
            $path = $uploadedFile->store('public/Produk');
            $attributes = Arr::add($attributes, 'image', $path);
        }

        Products::create($attributes);
        return redirect('adminpanel/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_products = ProductCategory::get();
        $product = Products::select()->where('id',$id)->first();
        return view('Adminpanel.Produk.edit', compact('category_products','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'product_category_id' => 'required',
            'stock' => 'required'
        ]);

        $attributes = [
            'name' => $request->name,
            'price' => $request->price,
            'product_category_id' => $request->product_category_id,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'description' => $request->description,
        ];
        if ($request->file('image')) {
            $uploadedFile = $request->file('image');
            $path = $uploadedFile->store('public/Produk');
            $attributes = Arr::add($attributes, 'image', $path);
        }

        Products::where('id',$id)->update($attributes);

        return redirect('adminpanel/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect('adminpanel/produk')->with('success', 'Gagal menghapus data ini.');
    }
}
