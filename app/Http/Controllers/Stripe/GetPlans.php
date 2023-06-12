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
        // $role = Role::select('id', 'display_name', 'name')->whereNotIn('name', ['admin', 'supervisor', 'moderator'])->get();

        // return $role;
        $role = Role::where('name', 'free')->first();
        Stripe\Stripe::setApiKey(\Config::get('services.stripe.secret'));

        $plans = Stripe\Plan::all();

        $result = [];
        foreach ($plans as $k => $plan) {
            if (! $plan->active) {
                continue;
            }

            /*
             * FREE PLAN
             */
            if ($k === 0) {
                $row1 = [];
                $row1['id'] = $role->id;
                $row1['amount'] = 0;
                $row1['nickname'] = $role->name;
                $row1['title'] = $role->display_name;
                $row1['subscribed'] = false;
                $result[] = $row1;
            }

            if (empty($plan->nickname)) {
                continue;
            }
//            if(empty($plan->nickname) || empty($plan->metadata->paypal_id)) continue;
            $row = [];
            $row['id'] = $plan->id;
            $row['amount'] = $plan->amount;
            $row['nickname'] = $plan->nickname;
            $row['paypal_id'] = $plan->metadata->paypal_id;
            $row['title'] = match ($plan->nickname) {
                'UTY' => 'Unlimited trees yearly.',
                'UTM' => 'Unlimited trees monthly.',
                'TTY' => 'Ten trees yearly.',
                'TTM' => 'Ten trees monthly.',
                'OTY' => 'One tree yearly.',
                'OTM' => 'One tree monthly.',
                default => '',
            };
            $row['subscribed'] = false;
            $result[] = $row;
        }

        return $result;
    }
}
