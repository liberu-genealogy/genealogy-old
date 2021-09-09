<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use App\Models\PaypalSubscription as PaypalSub;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use leifermendez\paypal\PaypalSubscription;

class HandlePayment extends Controller
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

        $subscription = [
            'quantity' => '1',
            'subscriber' => [
                'name' => [
                    'given_name' => $request->first_name,
                    'surname' => $request->last_name,
                ],
                'email_address' => $request->email,
            ],
            'application_context' => [
                'brand_name' => 'Family Tree 365',
                'locale' => 'es-ES',
                'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                'user_action' => 'SUBSCRIBE_NOW',
                'payment_method' => [
                    'payer_selected' => 'PAYPAL',
                    'payee_preferred' => 'IMMEDIATE_PAYMENT_REQUIRED',
                ],
                'return_url' => 'http://127.0.0.1:3000/success',
                'cancel_url' => 'http://127.0.0.1:3000/cancel',
            ],
        ];

        $plan = [
            'plan_id' => $request->id, // <-------- ************ ID DEL PLAN CREADO
        ];

        $response = $pp->createSubscription($subscription, $plan);

        PaypalSub::create([
            'paypal_id' => $response['id'],
            'user_email' => $request->email,
            'paypal_plan_id' => $request->plan_id,
            'status' => $response['status'],
            'start_time' => Carbon::parse($response['create_time'])->toDateTimeString(),
        ]);

        return $response['links'][0]['href'];
    }
}
