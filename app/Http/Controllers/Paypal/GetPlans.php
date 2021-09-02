<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use leifermendez\paypal\PaypalSubscription;

class GetPlans extends Controller
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
        $user = DB::table('landlord.users')
            ->where('email', $request->input('email'))
            ->get();

        if ($user[0]->paypal_subscription_id ?? null) {
            $subscription = $pp->getSubscription($user[0]->paypal_subscription_id);
            $sub = DB::table('landlord.paypal_subscriptions')
                ->where('id', $user[0]->paypal_subscription_id)
                ->get();
            if (count($sub) == 0) {
                DB::table('landlord.paypal_subscriptions')
                    ->insert([
                        'id' => $user[0]->paypal_subscription_id,
                        'user_email' => $request->input('email'),
                        'paypal_plan_id' => $subscription['plan_id'],
                        'status' => $subscription['status'],
                        'created_at' => $subscription['start_time'],
                    ]);
            }
        } else {
            $subscription = false;
        }

        $result = [];
        foreach ($this->plans as $plan) {
            // $row = (array) $plan;
            $row['id'] = $plan['id'] ?? null;
            $row['nickname'] = $plan['name'];
            switch ($plan['name']) {
                case 'UTY':
                    $row['title'] = 'Unlimited trees yearly.';
                    $row['amount'] = '75';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == 'ACTIVE') ? true : false;
                    break;
                case 'UTM':
                    $row['title'] = 'Unlimited trees monthly.';
                    $row['amount'] = '7.5';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == 'ACTIVE') ? true : false;
                    break;
                case 'TTY':
                    $row['title'] = 'Ten trees yearly.';
                    $row['amount'] = '25';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == 'ACTIVE') ? true : false;
                    break;
                case 'TTM':
                    $row['title'] = 'Ten trees monthly.';
                    $row['amount'] = '2.5';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == 'ACTIVE') ? true : false;
                    break;
                case 'OTY':
                    $row['title'] = 'One tree yearly.';
                    $row['amount'] = '10';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == 'ACTIVE') ? true : false;
                    break;
                case 'OTM':
                    $row['title'] = 'One tree monthly.';
                    $row['amount'] = '1';
                    $row['subscribed'] = ($subscription && $plan['id'] == $subscription['plan_id'] && $subscription['status'] == 'ACTIVE') ? true : false;
                    break;
            }

            $result[] = $row;
        }

        return $result;
    }
}
