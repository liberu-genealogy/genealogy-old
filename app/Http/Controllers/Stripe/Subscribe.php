<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Notifications\SubscribeSuccessfully;
use Illuminate\Http\Request;

class Subscribe extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $plan_id = $request->plan_id;
        if ($request->has('payment_method')) {
            $paymentMethod = $request->payment_method;
            $user->newSubscription('default', $plan_id)->create($paymentMethod);

            $user->notify(new SubscribeSuccessfully($plan_id));
        } else {
            $user->subscription('default')->swap($plan_id);
        }

        return ['success' => true];
    }
}
