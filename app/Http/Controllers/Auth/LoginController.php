<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }
    public function login()
    {
        return view('Auth.login');
    }

    public function doLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember')))
        {
            if (auth()->user()->user_type === 'admin')
            {
                Session::put('userType', 'admin');
                return redirect()->route('index');
            }
            elseif (auth()->user()->user_type === 'seller')
            {
                Session::put('userType', 'seller');
                return redirect()->route('index');
            }
            elseif (auth()->user()->user_type === 'customer')
            {
                Session::put('userType', 'customer');
                dd(auth()->user()->user_type, Session::get('userType'));
                return redirect()->route('index');
            }

        }
        session()->flash('message', 'Login failed, please try again!');
        return redirect()
            ->back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()
            ->route('login')
            ->with('message', 'Logout successfully...!');
    }

    public function register(Request $request)
    {
        #param
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $address = $request->input('address');

        $user = new User;
        $user->user_type = 'seller';
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->address = $address;
        $user->save();

        $seller = new Seller;
        $seller->user_id = $user->id;
        $seller->save();
        return redirect()->route('login');
    }

    public function forgetPassword()
    {
        return view('Auth.forget_password');
    }

    public function resetPassword()
    {
        return 'reset password';
    }

    public function register_page()
    {
        return view('Auth.register');
    }

    public function test()
    {
        return view('layouts.app');
    }
}
