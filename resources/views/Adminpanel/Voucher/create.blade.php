@extends('layouts.adminpanel')
@section('title', 'dashboard')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-grid.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-grid.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-reboot.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-reboot.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/drop-zone.css') }}" type="text/css">
    @endpush
@section('admincontent')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('adminpanel/voucher') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama </label>
                        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"
                            class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Code</label>
                        <input type="text" name="code" placeholder="code" value="{{ old('code') }}"
                            class="form-control @error('code') is-invalid @enderror" id="exampleInputPassword1">
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="exampleInputEmail1">Diskon</label>
                    <div class="input-group mb-3">
                        <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('discount') }}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Minimal Pembelian</label>
                        <input type="text" placeholder="Minimal Pembelian" name="min_pembelian"
                            value="{{ old('min_pembelian') }}"
                            class="form-control @error('min_pembelian') is-invalid @enderror" id="exampleInputPassword1">
                        @error('min_pembelian')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                            value="{{ old('description') }}" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ url('adminpanel/voucher') }}" class="btn btn-light">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
