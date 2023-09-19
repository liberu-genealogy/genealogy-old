<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Coupon;

class VerifyCoupon extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        try {
            $user->createAsStripeCustomer();
        } catch(\Exception $e) {
        }

        $couponCode = $request->input('coupon_code');

        \Stripe\Stripe::setApiKey(config('cashier.secret'));

        try {
            foreach (\Stripe\Coupon::all()->data as $coupon) {
                if (strtolower((string) $coupon->name) === strtolower((string) $couponCode) && $coupon->valid) {
                    return [
                        'success' => true,
                        'coupon' => $coupon,
                    ];
                }
            }
        } catch (\Stripe\Exception\InvalidRequestException) {
            return ['success' => false, 'message' => 'There was an error when checking your coupon.'];
        }

        return ['success' => false, 'message' => 'Coupon code is not valid'];
    }
}
