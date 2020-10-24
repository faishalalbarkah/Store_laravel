@extends('layouts.adminpanel')
@section('title', 'add product')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" />
    @endpush
@section('admincontent')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @include('include.alert')
                <form action="{{ url('adminpanel/produk/' .$product->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <h2> Add Product</h2>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nama"  value="{{ old('name',$product->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Harga </label>
                        <input type="number" class="form-control  @error('price') is-invalid @enderror" name="price" id="exampleFormControlInput1" placeholder="Harga"  value="{{ old('price',$product->price) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="exampleInputEmail1">Diskon</label>
                    <div class="input-group mb-3">
                        <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('discount',$product->price) }}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stok</label>
                        <input type="number" name="stock" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Stok" value="{{ old('stock',$product->stock) }}">
                        @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description"  rows="3">{{ old('desc',$product->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Gambar</label>
                        <input type="file" name="image" class="dropify" data-default-file="{{ Storage::url($product->image) }}" accept="image/*">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="product_category_id">
                            <option value="">--</option>
                            @foreach ($category_products as $category_product)
                                <option value="{{ $category_product->id }}" {{ old('product_category_id', $category_product->product_category_id)
                                == $category_product->productcategory ? 'selected' : '' }}>
                                     {{ $category_product->name }}
                                </option>
                            @endforeach
                            @error('product_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <button class="btn-success button-add-products">Save</button>
                    <a href="{{ url('adminpanel/produk') }}" class="btn btn-light">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();

    </script>
@endpush
