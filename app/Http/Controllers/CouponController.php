<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\VendorController;
use App\Http\Requests\CouponRequest;
use App\Models\CouponModel;
use App\Models\User;
use App\Notifications\CouponInsertedNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class CouponController extends Controller
{
    public function getAllCoupons(){
        if (Auth::user()->role == 'admin')
            $data = CouponModel::all();
        else
            $data = CouponModel::where('vendorId', VendorController::getVendorId(Auth::id()))->get();

        return view('backend.coupon.coupon_default', compact('data'));
    }

    /**
     * @param CouponRequest $request
     * @return Response
     */
    public function couponCreate(CouponRequest $request){
        // validation
        $data = $request->validated();

        $data['VendorId'] = VendorController::getVendorId(Auth::id());

        // insertion
        if (CouponModel::insert($data)){
            // notify the admins
            $admins = User::where('role', 'admin')->get();
            $shopName = DB::table('vendor_shop')->where('user_id', Auth::id())->get('shop_name')[0]->shop_name;
            Notification::send($admins, new CouponInsertedNotification($shopName));
            return response(['msg' => 'Coupon creato con successo'], 200);
        }

        else
            return redirect('coupons')->with('error', 'Qualcosa è andato storto, riprova.');

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function couponRemove(Request $request){
        $role = Auth::user()->role;
        try {
            $coupon = CouponModel::findOrFail($request->id);
            if ($coupon->delete())
                return redirect()->route($role . '-coupon')->with('success', 'Coupon rimossa con successo.');
            else
                return redirect('coupons')->with('error', 'Qualcosa è andato storto, riprova.');
        }catch (ModelNotFoundException $exception){
            return redirect('coupon')->with('error', 'Qualcosa è andato storto, riprova.');
        }
    }

    /**
     * @param CouponRequest $request
     * @return Response
     */
    public function couponUpdate(CouponRequest $request){
        // validation
        $data = $request->validated();

        // get the current coupon ( which being updated )
        try {
            $coupon = CouponModel::findOrFail($request->get('coupon_id'));
        }catch (ModelNotFoundException $exception){
            return redirect()->route('vendor-coupon')->with('error', 'Qualcosa è andato storto, riprova.');
        }

        // update
        if ($coupon->update($data))
            return response(['msg' => 'Coupon aggiornato con successo'], 200);
        else
            return redirect()->route('vendor-coupon')->with('error', 'Qualcosa è andato storto, riprova.');
    }
}
