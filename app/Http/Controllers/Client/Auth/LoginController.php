<?php

namespace App\Http\Controllers\Client\Auth;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:customer')->except('postLogout');
    }

    public function login()
    {
        return view('Client.Auth.login');
    }

    public function loginakun(Request $request)
    {
        $credentials = [
            'name' => $request['name'],
            'password' => $request['password'],
            // 'status' => $request[1],
        ];

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('home');
        }
    }

    public function postLogout()
    {
          dd(Auth::guard('customer')->logout());
        Auth::guard('customer')->logout();

        return redirect()->route('/');
    }

    public function register(Request $request)
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
            'phone' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return view('Client.Auth.login');
    }
}
