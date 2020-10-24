<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::paginate(10);
        return view('Adminpanel.Promotion.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Adminpanel.Promotion.create');
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
            'title' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:5000',
            'description' => 'required',
        ]);

        $attributes = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        if ($request->file('image')) {
            $uploadedFile = $request->file('image');
            $path = $uploadedFile->store('public/Promotion');
            $attributes = Arr::add($attributes, 'image', $path);
        }

        Promotion::create($attributes);
        return redirect('adminpanel/promotion');
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
        $promotion = Promotion::select()->where('id', $id)->first();
        return view('Adminpanel.Promotion.edit', compact('promotion'));
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $attributes = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->file('image')) {
            $uploadedFile = $request->file('image');
            $path = $uploadedFile->store('public/Promotion');
            $attributes = Arr::add($attributes, 'image', $path);
        }

        Promotion::where('id', $id)->update($attributes);
        return redirect('adminpanel/promotion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        return redirect('adminpanel/promotion');
    }
}
