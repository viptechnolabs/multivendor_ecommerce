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

        $sellers = Seller::with('user')->where('verification_status', 1)->paginate(10);
        return view('sellers.index',['sellers'=>$sellers]);
    }

    public function sellerRequest(Request $request)
    {
        $sellers = Seller::where('verification_status','==' , 0)->with('user')->paginate(10);
        return view('sellers.seller_request',['sellers'=>$sellers]);
    }

    public function updateApproved(Request $request)
    {
        $seller = Seller::findOrFail($request->id);
        $seller->verification_status = $request->status;
        if ($seller->save()) {
            return 1;
        }
        return 0;
//        session()->flash('message', 'Category has been updated successfully');
//        return redirect()->route('category');
    }
}
