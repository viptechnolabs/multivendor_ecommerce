<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        dd(Auth::user()->banned);
        if (Auth::user()->banned == 1) {
            return $next($request);
        }

        Session::flush();
        Auth::logout();
        return redirect()
            ->route('login')
            ->with('message','You are logout...!');
    }
}
