<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getPlans(Request $request)
    {
        $paypalPlans = $this->getPaypalPlans($request);
        $stripePlans = $this->getStripePlans($request);

        return [
            'paypal_plans' => $paypalPlans,
            'stripe_plans' => $stripePlans,
        ];
    }

    protected function getPaypalPlans(Request $request)
    {
        return (new Paypal())->getPlans($request);
    }

    protected function getStripePlans(Request $request)
    {
        return (new Stripe())->getPlans($request);
    }
}
