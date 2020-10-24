@extends('layouts.app')
@section('title', 'Login')
    @push('css')
    @endpush
@section('content')
    <div class="m-t-120 m-b-120">
        <div class="container">
            <div class="card" style="background-color: #222">
                <label class="text-center m-t-30"><h1 style="font-weight: 800; color:white;" >Registrasi</h1></label>
                <div class="card-body">
                    <form action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: white">Username</label>
                            <input type="text" name="name" value="{{old('name')}}"  class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: white">Email address</label>
                            <input type="email" name="email" value="{{old('email')}}"  class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="color: white">Password</label>
                            <input type="password" name="password" value="{{old('password')}}"  class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="color: white">Address</label>
                            <input type="text" name="address" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="color: white">No Hp</label>
                            <input type="number" name="phone" value="{{old('phone')}}"  class="form-control @error('phone') is-invalid @enderror" id="exampleInputPassword1">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /form -->

@endsection
@push('js')
@endpush
