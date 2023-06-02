<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class GetPlans extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function __invoke(Request $request)
    {
        $provider = new PayPalClient();
        $provider->getAccessToken();
        return $provider->listPlans();
    }
}
