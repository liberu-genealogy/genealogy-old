<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetCurrentSubscription extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return array
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $data = [];
        $data['has_payment_method'] = $user->hasDefaultPaymentMethod();
        if ($user->subscribed('default')) {
            $subscription = $user->subscription();

            $data['subscribed'] = $subscription->stripe_status != 'canceled';

            $data['plan_id'] = $subscription->stripe_price;
            $data['trial_end'] = null;

            try {
                \Stripe\Stripe::setApiKey(\Config::get('services.stripe.secret'));
                $stripeSub = \Stripe\Subscription::retrieve($subscription->stripe_id);

                $data['trial_end'] = date('F j, Y', $stripeSub->trial_end);

                $finalPrice = $price = $stripeSub->plan->amount;
                $discountAmount = 0;

                try {
                    $coupon = $stripeSub->discount->coupon;
                    // check the type of coupon - it can be 'fixed_amount' or 'percent_off'
                    if ($coupon->amount_off) {
                        $discountAmount = $coupon->amount_off;
                        $finalPrice = $price - $discountAmount;
                    } elseif ($coupon->percent_off) {
                        $discountAmount = ($price * $coupon->percent_off / 100);
                        $finalPrice = $price - $discountAmount;
                    }
                } catch (\Exception) {
                }

                $data['final_price'] = $finalPrice;
                $data['discount_amount'] = $discountAmount;
            } catch (Exception) {
            }
        } else {
            $data['subscribed'] = false;
        }

        return $data;
    }
}
