<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\User;
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

    public function updateApproved(Request $request): int
    {
        $seller = Seller::findOrFail($request->id);
        $seller->verification_status = $request->status;
        if ($seller->save()) {
            session()->flash('message', 'Approved sellers updated successfully');
            return 1;
        }
        return 0;
    }

    public function updateSellerStatus(Request $request): int
    {
        $seller = Seller::findOrFail($request->id);
        $user = User::findOrFail($seller->user_id);
        $user->banned = $request->status;
//        $seller->verification_status = $request->status;
        if ($user->save()) {
            return 1;
        }
        return 0;
    }
}
