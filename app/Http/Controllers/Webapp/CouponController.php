<?php

namespace App\Http\Controllers\Webapp;


 use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EcomCoupon;

class CouponController extends Controller
{
    public function coupon()
    {
        $coupons = EcomCoupon::where('status',1)->get();
        return view('webapp.coupons',['coupans' => $coupons]);
    }
}
