<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use App\Models\PaypalSubscription as PaypalSub;
use Illuminate\Http\Request;
use leifermendez\paypal\PaypalSubscription;

class Unsubscribe extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pp = new PaypalSubscription();
        $response = $pp->cancelSubscription($request->paypal_subscription_id);

        PaypalSub::where('paypal_id', $request->paypal_subscription_id)
            ->update(['status' => 'CANCELLED']);

        return $response;
    }
}
