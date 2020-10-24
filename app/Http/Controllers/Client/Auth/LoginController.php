<?php

namespace App\Http\Controllers\Client\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class LoginController extends Controller
{
    public function login ()
    {
        return view('Client.Auth.login');
    }

    public function loginakun ()
    {

        $user = User::where('name', $request->name)->orWhere('email',$request->email)->first();
        if($user){
            if(password_verify($request->password,$user->password)){
                if($user->status == 1){

                }
            }
        }
        return view('Client.Auth.login');
    }

    public function register()
    {
        return view('Client.Auth.register');
    }

    public function registrasi(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return view('Client.Auth.login');
    }
}
