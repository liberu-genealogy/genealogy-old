<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use App\Models\PaypalPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use leifermendez\paypal\PaypalSubscription;

class CreatePlans extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request = null)
    {
        $pp = new PaypalSubscription();
        $plans = [
            [
                'name' => 'UTY',
                'description' => 'Unlimited trees yearly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'YEAR',
                            'interval_count' => '1',
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '75',
                                'currency_code' => 'GBP',
                            ],
                        ],
                    ],
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP',
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3',
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false,
                ],
            ],

            [
                'name' => 'UTM',
                'description' => 'Unlimited trees monthly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'MONTH',
                            'interval_count' => '1',
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '7.5',
                                'currency_code' => 'GBP',
                            ],
                        ],
                    ],
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP',
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3',
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false,
                ],
            ],

            [
                'name' => 'TTY',
                'description' => 'Ten trees yearly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'YEAR',
                            'interval_count' => '1',
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '25',
                                'currency_code' => 'GBP',
                            ],
                        ],
                    ],
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP',
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3',
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false,
                ],
            ],

            [
                'name' => 'TTM',
                'description' => 'Ten trees monthly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'MONTH',
                            'interval_count' => '1',
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '2.5',
                                'currency_code' => 'GBP',
                            ],
                        ],
                    ],
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP',
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3',
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false,
                ],
            ],

            [
                'name' => 'OTY',
                'description' => 'One tree yearly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'YEAR',
                            'interval_count' => '1',
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '10',
                                'currency_code' => 'GBP',
                            ],
                        ],
                    ],
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP',
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3',
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false,
                ],
            ],

            [
                'name' => 'OTM',
                'description' => 'One tree monthly 1',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'MONTH',
                            'interval_count' => '1',
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '1',
                                'currency_code' => 'GBP',
                            ],
                        ],
                    ],
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP',
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3',
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false,
                ],
            ],
        ];

        $paypalProduct = new CreateProduct;
        $paypalProduct();

        $product = [
            'product_id' => $paypalProduct->paypal_id, //<--------***** ID DEL PRODUCTO
        ];

        foreach ($plans as $plan) {
            $paypalPlan = PaypalPlan::where('name', $plan['name'])->first();

            if (! $paypalPlan) {
                $response = $pp->createPlan($plan, $product);

                PaypalPlan::create([
                    'paypal_id' => $response['id'],
                    'paypal_product_id' => $response['product_id'],
                    'name' => $response['name'],
                    'status' => $response['status'],
                    'description' => $response['description'],
                    'usage_type' => $response['usage_type'],
                    'create_time' => Carbon::parse($response['create_time'])->toDateTimeString(),
                ]);
            }
        }
    }
}
