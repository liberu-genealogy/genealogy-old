<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use leifermendez\paypal\PaypalSubscription;

class CreatePlans extends Controller
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
        $this->plans = [
            [
                'name' => 'UTY',
                'description' => 'Unlimited trees yearly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'YEAR',
                            'interval_count' => '1'
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '75',
                                'currency_code' => 'GBP'
                            ]
                        ]
                    ]
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP'
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3'
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false
                ]
            ],

            [
                'name' => 'UTM',
                'description' => 'Unlimited trees monthly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'MONTH',
                            'interval_count' => '1'
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '7.5',
                                'currency_code' => 'GBP'
                            ]
                        ]
                    ]
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP'
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3'
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false
                ]
            ],

            [
                'name' => 'TTY',
                'description' => 'Ten trees yearly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'YEAR',
                            'interval_count' => '1'
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '25',
                                'currency_code' => 'GBP'
                            ]
                        ]
                    ]
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP'
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3'
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false
                ]
            ],

            [
                'name' => 'TTM',
                'description' => 'Ten trees monthly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'MONTH',
                            'interval_count' => '1'
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '2.5',
                                'currency_code' => 'GBP'
                            ]
                        ]
                    ]
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP'
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3'
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false
                ]
            ],

            [
                'name' => 'OTY',
                'description' => 'One tree yearly',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'YEAR',
                            'interval_count' => '1'
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '10',
                                'currency_code' => 'GBP'
                            ]
                        ]
                    ]
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP'
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3'
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false
                ]
            ],

            [
                'name' => 'OTM',
                'description' => 'One tree monthly 1',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'MONTH',
                            'interval_count' => '1'
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => '1',
                        'total_cycles' => '12',
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => '1',
                                'currency_code' => 'GBP'
                            ]
                        ]
                    ]
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => 'true',
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'GBP'
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => '3'
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false
                ]
            ],
        ];


        $product = [
            'product_id' => $this->product_id //<--------***** ID DEL PRODUCTO
        ];

        $plans1 = $pp->getPlans();
        // $plans = $plans['plans'];
        // // dd($plans);
        $plans = $plans1['plans'] ?? [];
        if (count($plans) < 7) {
            for ($i=0; $i < count($plans); $i++) {
                $response = $pp->createPlan($plans[$i], $product);
                // var_dump($response);
                array_push($this->plans, $response);
                DB::table('landlord.plans')
                    ->insert([
                        'id' => $response['id'],
                        'name' => $response['name'],
                        'status' => $response['status'],
                        'description' => $response['description'],
                        'usage_type' => $response['usage_type'],
                        'create_time' => $response['create_time'],
                    ]);
            }

        } else {
            $plans = DB::table('landlord.plans')
                ->orderBy('name', 'desc')
                ->get();
            for ($i=0; $i < count($plans); $i++) {
                $plan = [
                    "id" => $plans[$i]->id,
                    "name" => $plans[$i]->name,
                    "status" => $plans[$i]->status,
                    "description" => $plans[$i]->description,
                    "usage_type" => $plans[$i]->usage_type,
                    "create_time" => $plans[$i]->create_time,
                ];
                array_push($this->plans, $plan);
            }
            // dd($this->plans);
        }
    }
}
