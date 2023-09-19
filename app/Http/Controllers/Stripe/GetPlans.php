<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelEnso\Roles\Models\Role;
use Stripe;

class GetPlans extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
//        $role = Role::where("name", "free")->first();
        Stripe\Stripe::setApiKey(\Config::get('services.stripe.secret'));

        $plans = Stripe\Plan::all();

        $result = [];
        foreach ($plans as $plan) {
            if (! $plan->active || $plan->amount == 0) {
                continue;
            }

            /*
             * FREE PLAN
             */

            /**
             * if ($k === 0) {
             * $row1 = [];
             * $row1["id"] = $role->id;
             * $row1["amount"] = 0;
             * $row1["nickname"] = $role->name;
             * $row1["title"] = $role->display_name;
             * $row1["subscribed"] = false;
             * $result[] = $row1;
             * }.
             **/
            if (empty($plan->nickname)) {
                continue;
            }
            $row = [];

            $row['id'] = $plan->id;
            $row['amount'] = $plan->amount;
            $row['title'] = $plan->nickname;
            $row['nickname'] = $plan->title;
            $row['interval'] = $plan->interval;
            $row['trial_end'] = null;

            $row['features'] = [];
            $row['features_missing'] = [];
            $row['metadata'] = [
                'featured' => false,
                'description' => 'Missing description!!!',
            ];

            foreach ($plan->metadata->toArray() as $key => $value) {
                if (preg_match('/^feature-missing\d*$/', (string) $key)) {
                    $row['features_missing'][] = $value;
                }
                if (preg_match('/^feature\d*$/', (string) $key)) {
                    $row['features'][] = $value;
                }
                if ($key == 'featured' && ($value == 1 || $value == 'true')) {
                    $row['metadata']['featured'] = true;
                }
            }
            $row['subscribed'] = false;
            $result[] = $row;
        }

        return $result;
    }
}
