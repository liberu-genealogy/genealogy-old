<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetCurrentSubscription extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $data = [];
        $data['has_payment_method'] = $user->hasDefaultPaymentMethod();
        if ($user->subscribed('default')) {
            $data['subscribed'] = true;
            $data['plan_id'] = $user->subscription()->stripe_price;
        } else {
            $data['subscribed'] = false;
        }

        return $data;
    }
}
