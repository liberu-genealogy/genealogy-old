<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Paypal\GetPlans;
use Illuminate\Http\Request;

class Paypal extends Controller
{
    public function getPlans(Request $request)
    {
        $paypalPlans = new GetPlans();

        return $paypalPlans($request);
    }
}
