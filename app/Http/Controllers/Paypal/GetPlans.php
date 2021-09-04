<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use App\Models\PaypalSubscription as PaypalSub;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use leifermendez\paypal\PaypalSubscription;

class GetPlans extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __invoke(Request $request)
    {
        $pp = new PaypalSubscription($this->app_id, $this->app_sk, $this->mode);
        $user = User::where('email', $request->email)->first();
        $subscription = false;

        if ($user->paypal_subscription_id) {
            $subscription = $pp->getSubscription($user->paypal_subscription_id);
            $sub = PaypalSub::where('id', $user->paypal_subscription_id)->first();

            if (!$sub) {
                PaypalSub::create([
                    'paypal_subscription_id' => $user->paypal_subscription_id,
                    'user_email' => $request->email,
                    'paypal_plan_id' => $subscription['plan_id'],
                    'status' => $subscription['status'],
                    'start_time' => $subscription['start_time'],
                ]);
            }
        }

        $result = [];
        $plans = Plan::all();

        foreach ($plans as $plan) {
            $row['id'] = $plan['plan_id'] ?? null;
            $row['nickname'] = $plan['name'];
            switch ($plan['name']) {
                case 'UTY':
                    $row['title'] = 'Unlimited trees yearly.';
                    $row['amount'] = '75';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == "ACTIVE") ? true : false;
                    break;
                case 'UTM':
                    $row['title'] = 'Unlimited trees monthly.';
                    $row['amount'] = '7.5';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == "ACTIVE") ? true : false;
                    break;
                case 'TTY':
                    $row['title'] = 'Ten trees yearly.';
                    $row['amount'] = '25';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == "ACTIVE") ? true : false;
                    break;
                case 'TTM':
                    $row['title'] = 'Ten trees monthly.';
                    $row['amount'] = '2.5';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == "ACTIVE") ? true : false;
                    break;
                case 'OTY':
                    $row['title'] = 'One tree yearly.';
                    $row['amount'] = '10';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == "ACTIVE") ? true : false;
                    break;
                case 'OTM':
                    $row['title'] = 'One tree monthly.';
                    $row['amount'] = '1';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == "ACTIVE") ? true : false;
                    break;
            }

            $result[] = $row;
        }

        return $result;
    }
}
