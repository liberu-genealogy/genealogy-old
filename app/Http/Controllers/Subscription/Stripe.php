<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Stripe\GetPlans;
use Illuminate\Http\Request;

class Stripe extends Controller
{
    public function getPlans(Request $request)
    {
        $paypalPlans = new GetPlans();

        return $paypalPlans($request);
    }
}
