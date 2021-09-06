<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use App\Models\PaypalProduct;
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
        $product = [
            'name' => $request->name ?? 'Family365',
            'description' => $request->description ?? 'Family trees',
            'type' => $request->type ?? 'SERVICE',
            'category' => $request->type ?? 'SOFTWARE',
        ];

        $paypalProduct = PaypalProduct::where($product)->first();

        if (!$paypalProduct) {
            $pp = new PaypalSubscription();
            $response = $pp->createProduct($product);
            $product['paypal_id'] = $response['id'];
            $paypalProduct = PaypalProduct::create($product);
        }

        return $paypalProduct;
    }
}
