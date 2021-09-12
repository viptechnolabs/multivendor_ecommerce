<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function index()
    {
        return view('sellers.index');
    }

    public function sellerRequest()
    {
        return view('sellers.seller_request');
    }
}
