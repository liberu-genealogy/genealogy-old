<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Notifications\SubscribeSuccessfully;
use Illuminate\Http\Request;

class PaymentMethod extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function updateDefaultPaymentMethod(Request $request)
    {
        $user = auth()->user();
        if ($request->has('payment_method')) {
            $customer = $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($request->input('payment_method'));
        }
        /*
        $stripeCustomerId = $stripeCustomer->id;
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        \Stripe\Customer::retrieve($stripeCustomerId)->delete();
        dd($stripeCustomer);
        */
    }
}
