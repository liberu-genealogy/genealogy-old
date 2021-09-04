<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use App\Models\PaypalSubscription as PaypalSub;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use leifermendez\paypal\PaypalSubscription;

class Unsubscribe extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pp = new PaypalSubscription();
        $user = User::where('email', $request->email)->first();
        $response = $pp->cancelSubscription($user->paypal_subscription_id);

        User::where('email', $request->email)
            ->update(['paypal_subscription_id' => '']);

        PaypalSub::where('id', $user->paypal_subscription_id)
            ->update(['status' => 'CANCELLED']);

        return $response;
    }
}
