<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\User;
use App\Notifications\SellerRequestDelete;
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

    public function sellerApproved(Request $request): int
    {
        $seller = Seller::findOrFail($request->id);
        $seller->verification_status = $request->status;
        if ($seller->save()) {
            activity('Verification status')
                ->performedOn($seller)
                ->log($seller->name . ' seller are verified');
            session()->flash('message', 'Approved sellers updated successfully');
            return 1;
        }
        return 0;
    }

    public function sellerRequestDelete(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $seller = Seller::findOrFail($id);
        # Send mail
        $seller->user->notify(new SellerRequestDelete());
        activity('Verification status')
            ->performedOn($seller)
            ->log($seller->name . ' seller are rejected');
        return back();
    }

    public function updateSellerStatus(Request $request): int
    {
        $seller = Seller::findOrFail($request->id);
        $user = User::findOrFail($seller->user_id);
        $user->banned = $request->status;
        if ($user->save()) {
            activity('User status update')
                ->performedOn($seller)
                ->log($seller->name . '' . 'seller status updated');
            return 1;
        }
        return 0;
    }

    public function sellerProfile($id)
    {
        $seller = Seller::findOrFail($id);
        return view('sellers.seller_profile', ['seller' => $seller]);
    }

}
