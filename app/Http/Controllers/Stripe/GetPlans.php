<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use LaravelEnso\Roles\Models\Role;
use Illuminate\Http\Request;
use Stripe;

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
        // $role = Role::select('id', 'display_name', 'name')->whereNotIn('name', ['admin', 'supervisor', 'moderator'])->get();

        // return $role;
        $role = Role::where('name', 'free')->first();
        Stripe\Stripe::setApiKey(\Config::get('services.stripe.secret'));

        $plans = Stripe\Plan::all();

        $result = [];
        foreach ($plans as $k=>$plan) {
               if ($k == 0) {
                     $row1['id'] = $role->id;
                     $row1['amount'] = 0;
                     $row1['nickname'] = $role->name;
                     $row1['title'] = $role->display_name;
                     $row1['subscribed'] = false;
                     $result[] = $row1;
                 }

            if(empty($plan->nickname)) continue;
//            if(empty($plan->nickname) || empty($plan->metadata->paypal_id)) continue;

            $row ['id'] = $plan->id;
            $row['amount'] = $plan->amount;
            $row['nickname'] = $plan->nickname;
            $row['paypal_id'] = $plan->metadata->paypal_id;
            switch ($plan->nickname) {
                case 'UTY':
                    $row['title'] = 'Unlimited trees yearly.';
                    break;
                case 'UTM':
                    $row['title'] = 'Unlimited trees monthly.';
                    break;
                case 'TTY':
                    $row['title'] = 'Ten trees yearly.';
                    break;
                case 'TTM':
                    $row['title'] = 'Ten trees monthly.';
                    break;
                case 'OTY':
                    $row['title'] = 'One tree yearly.';
                    break;
                case 'OTM':
                    $row['title'] = 'One tree monthly.';
                    break;
                default:$row['title'] = '';
            }
            $row['subscribed'] = false;
            $result[] = $row;
        }

        return $result;

}
}
