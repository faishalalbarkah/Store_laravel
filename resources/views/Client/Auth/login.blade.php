@extends('layouts.app')
@section('title', 'Login')
    @push('css')
    @endpush
@section('content')
    <div class="m-t-120 m-b-120">
        <div class="container">
            <div class="card" style="background-color: #222">
                <label class="text-center m-t-30"><h1 style="font-weight: 800; color:white;">Login</h1></label>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: white">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="color: white">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
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
