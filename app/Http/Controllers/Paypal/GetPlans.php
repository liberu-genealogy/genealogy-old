<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use App\Models\PaypalPlan;
use App\Models\PaypalSubscription as PaypalSub;
use App\Service\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelEnso\Multitenancy\Enums\Connections;

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
        $tenant = Auth::user()->company();
        Tenant::set($tenant);
        $company = Tenant::get();
        $db = Connections::Tenant.$company->id;

        // $createPlan = new CreatePlans();
        // $createPlan();

        $result = [];
        $plans = DB::connection(Connections::Tenant)->table('paypal_plans')->get();

        foreach ($plans as $plan) {
            $subscription = DB::connection(Connections::Tenant)->table('paypal_subscriptions')
                ->where('user_email', $request->email)
                ->where('paypal_plan_id', $plan->paypal_id)
                ->first();

            $row['id'] = $plan->paypal_id;
            $row['nickname'] = $plan->name;
            switch ($plan->name) {
                case 'UTY':
                    $row['title'] = 'Unlimited trees yearly.';
                    $row['amount'] = '75';
                    $row['subscribed'] = ($subscription && $plan->paypal_id === $subscription->paypal_plan_id && $subscription->status === 'ACTIVE') ? true : false;
                    break;
                case 'UTM':
                    $row['title'] = 'Unlimited trees monthly.';
                    $row['amount'] = '7.5';
                    $row['subscribed'] = ($subscription && $plan->paypal_id === $subscription->paypal_plan_id && $subscription->status === 'ACTIVE') ? true : false;
                    break;
                case 'TTY':
                    $row['title'] = 'Ten trees yearly.';
                    $row['amount'] = '25';
                    $row['subscribed'] = ($subscription && $plan->paypal_id === $subscription->paypal_plan_id && $subscription->status === 'ACTIVE') ? true : false;
                    break;
                case 'TTM':
                    $row['title'] = 'Ten trees monthly.';
                    $row['amount'] = '2.5';
                    $row['subscribed'] = ($subscription && $plan->paypal_id === $subscription->paypal_plan_id && $subscription->status === 'ACTIVE') ? true : false;
                    break;
                case 'OTY':
                    $row['title'] = 'One tree yearly.';
                    $row['amount'] = '10';
                    $row['subscribed'] = ($subscription && $plan->paypal_id === $subscription->paypal_plan_id && $subscription->status === 'ACTIVE') ? true : false;
                    break;
                case 'OTM':
                    $row['title'] = 'One tree monthly.';
                    $row['amount'] = '1';
                    $row['subscribed'] = ($subscription && $plan->paypal_id === $subscription->paypal_plan_id && $subscription->status === 'ACTIVE') ? true : false;
                    break;
            }

            $result[] = $row;
        }

        return $result;
    }
}
