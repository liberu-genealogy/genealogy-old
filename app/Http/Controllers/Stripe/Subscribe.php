<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $user->syncRoles('OTY');
        $plan_id = 'price_monthly'; // request()->plan_id;
        if (request()->has('payment_method')) {
            $paymentMethod = request()->payment_method;
            $user->newSubscription('default', $plan_id)
                ->create($paymentMethod, ['name' => request()->card_holder_name, 'address' => ['country' => 'GB', 'state' => 'England', 'city' => 'Abberley', 'postal_code' => 'WR6', 'line1' => 'test', 'line2' => '']]);
            $user->notify(new SubscribeSuccessfully($plan_id));
        } elseif ($user->hasDefaultPaymentMethod()) {
            $paymentMethod = $user->defaultPaymentMethod();
            $user->newSubscription('default', $plan_id)->create($paymentMethod->id);
            $user->notify(new SubscribeSuccessfully($plan_id));
        } else {
            $user->subscription('default')->swap($plan_id);
        }

        return ['success' => true];
    }
}
