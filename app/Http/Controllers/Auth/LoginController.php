<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SellerSignupRequest;
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

    public function doLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'banned' => '1'], $request->filled('remember')))
        {
            if (auth()->user()->user_type === 'admin')
            {
                Session::put('userType', 'admin');
                activity('Admin login')
                    ->performedOn(auth()->user())
                    ->log(auth()->user()->name . '  admin login');
                return redirect()->route('index');
            }
            elseif (auth()->user()->user_type === 'seller')
            {
                Session::put('userType', 'seller');
                activity('Seller login')
                    ->performedOn(auth()->user())
                    ->log(auth()->user()->name . '  seller login');
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
        activity(auth()->user()->user_type . '' . ' logout')
            ->performedOn(auth()->user())
            ->log(auth()->user()->name . ' ' . auth()->user()->user_type . '' .' logout');
        Session::flush();
        Auth::logout();
        return redirect()
            ->route('login')
            ->with('message', 'Logout successfully...!');
    }

    public function register(SellerSignupRequest $request)
    {
        #param
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $address = $request->input('address');
        $city = $request->input('city');
        $bank_name = $request->input('bank_name');
        $bank_acc_name = $request->input('bank_acc_name');
        $bank_acc_no = $request->input('bank_acc_no');
        $bank_routing_no = $request->input('bank_routing_no');

        $user = new User;
        $user->user_type = 'seller';
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->address = $address;
        $user->city = $city;
        $user->save();

        $seller = new Seller;
        $seller->user_id = $user->id;
        $seller->bank_name = $bank_name;
        $seller->bank_acc_name = $bank_acc_name;
        $seller->bank_acc_no = $bank_acc_no;
        $seller->bank_routing_no = $bank_routing_no;
        $seller->save();

        activity('Seller register')
            ->performedOn($seller)
            ->log($user->name . '' . ' are to send seller request');

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
