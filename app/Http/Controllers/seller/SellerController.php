<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function index(Request $request)
    {

        $search = $request->input('search');
        $sellers = Seller::whereHas('user',function ($query) {
            $query->where('user_type','seller')
            ->orWhere('status',1);
        })->paginate(10);
        return view('sellers.index',['sellers'=>$sellers]);
    }

    public function sellerRequest(Request $request)
    {
        $search = $request->input('search');
        $sellers = Seller::whereHas('user',function ($query)use ($search){
                $query->where('name','LIKE', '%' . $search );
            })
            ->paginate(10);
        return view('sellers.seller_request',['sellers'=>$sellers]);
    }
}
