<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use leifermendez\paypal\PaypalSubscription;

class CreateProduct extends Controller
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
        $product = [
            'name' => 'Family365',
            'description' => 'Family trees',
            'type' => 'SERVICE',
            'category' => 'SOFTWARE',
        ];
        $res = $pp->createProduct($product);
        $this->product_id = $res['id'] ?? null;
    }
}
