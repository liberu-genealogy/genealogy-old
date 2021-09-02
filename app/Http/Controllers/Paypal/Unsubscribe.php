<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
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
        $pp = new PaypalSubscription($this->app_id, $this->app_sk, $this->mode);
        $user = DB::table('landlord.users')
            ->where('email', $request->input('email'))
            ->get();
        $response1 = $pp->cancelSubscription($user[0]->paypal_subscription_id);
        DB::table('landlord.users')
            ->where('email', $request->input('email'))
            ->update(['paypal_subscription_id' => '']);

        $updated_at = Carbon::now();
        DB::table('landlord.paypal_subscriptions')
            ->where('id', $user[0]->paypal_subscription_id)
            ->update(['status' => 'CANCELLED', 'updated_at' => $updated_at->toAtomString()]);

        return $response1;
    }
}
