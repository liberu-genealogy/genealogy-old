<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
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
        // return $request;

        $pp = new PaypalSubscription($this->app_id, $this->app_sk, $this->mode);

        $startdate = Carbon::now();
        $startdate->addMinutes(1);

        $subscription = [
            'start_time' =>  $startdate->toAtomString(),
            'quantity' => '1',
            'shipping_amount' => [
                'currency_code' => 'GBP',
                'value' => '0'
            ],
            'subscriber' => [
                'name' => [
                    'given_name' => $request->input('first_name'),
                    'surname' => $request->input('last_name')
                ],
                'email_address' => $request->input('email'),
                'shipping_address' => [
                    'name' => [
                        'full_name' => $request->input('first_name').$request->input('last_name')
                    ],
                    'address' => [
                        'address_line_1' => '2211 N First Street',
                        'address_line_2' => 'Building  17',
                        'admin_area_2' => 'San Jose',
                        'admin_area_1' => 'CA',
                        'postal_code' => '95131',
                        'country_code' => 'US'
                    ]
                ]
            ],
            'application_context' => [
                'brand_name' => 'Racks',
                'locale' => 'es-ES',
                'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                'user_action' => 'SUBSCRIBE_NOW',
                'payment_method' => [
                    'payer_selected' => 'PAYPAL',
                    'payee_preferred' => 'IMMEDIATE_PAYMENT_REQUIRED',
                ],
                'return_url' => 'http://127.0.0.1:3000/success',
                'cancel_url' => 'http://127.0.0.1:3000/cancel'

            ]
        ];

        // 'return_url' => 'https://github.com/leifermendez?status=returnSuccess',
        // 'cancel_url' => 'https://github.com/leifermendez?status=cancelUrl'

        $plan = [
            'plan_id' => $request->input('id') // <-------- ************ ID DEL PLAN CREADO
        ];

        $response = $pp->createSubscription($subscription, $plan);

        // *** Store paypal_subscription_id to USER db
        $user = DB::table('landlord.users')
            ->where('email', $request->input('email'))
            ->get();

        // if ($user['paypal_subscription_id']) {
//      $response1 = $pp->cancelSubscription($user[0]->paypal_subscription_id);
        // }

        DB::table('landlord.users')
            ->where('email', $request->input('email'))
            ->update(['paypal_subscription_id' => $response['id']]);

        $updated_at = Carbon::now();
        DB::table('landlord.paypal_subscriptions')
            ->where('id', $user[0]->paypal_subscription_id)
            ->update(['status' => "CANCELLED", 'updated_at' => $updated_at->toAtomString()]);



        return $response['links'][0]['href'];
        // return $response;

        // $res = $pp->getSubscription($response['id']);

        // dd($res);
    }
}
