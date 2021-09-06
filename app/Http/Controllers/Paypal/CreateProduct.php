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
        $pp = new PaypalSubscription();
        $product = [
            'name' => $request->name ?? 'Family365',
            'description' => $request->description ?? 'Family trees',
            'type' => $request->type ?? 'SERVICE',
            'category' => $request->type ?? 'SOFTWARE',
        ];
        $response = $pp->createProduct($product);

        $product['paypal_product_id'] = $response['id'];
        PaypalProduct::create($product);
    }
}
