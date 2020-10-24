@extends('layouts.adminpanel')
@section('title', 'add promotion')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" />
    @endpush
@section('admincontent')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('adminpanel/promotion') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h2> Add Promotion</h2>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Judul"  value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" value="{{ old('description') }}"  rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Gambar</label>
                        <input type="file" name="image" class="dropify" accept="image/*">

                    </div>

                    <button class="btn-success button-add-products">Save</button>
                    <a href="{{ url('adminpanel/promotion') }}" class="btn btn-light">Kembali</a>
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
