<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe;

class Webhook extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Stripe\Stripe::setApiKey(\Config::get('services.stripe.secret'));
        $plans = Stripe\Plan::all();
        $data = request()->all();
        $user = User::where('stripe_id', $data['data']['object']['customer'])->first();
        if ($user) {
            $plan_nickname = $data['data']['object']['items']['data'][0]['plan']['nickname'];
            foreach ($plans as $plan) {
                if ($plan->nickname == $plan_nickname) {
                    switch ($plan->nickname) {
                        case 'UTY':
                            $user->syncRoles('UTY');
                            break;
                        case 'UTM':
                            $user->syncRoles('UTM');
                            break;
                        case 'TTY':
                            $user->syncRoles('TTY');
                            break;
                        case 'TTM':
                            $user->syncRoles('TTM');
                            break;
                        case 'OTY':
                            $user->syncRoles('OTY');
                            break;
                        case 'OTM':
                            $user->syncRoles('OTM');
                            break;
                    }
                }
            }
        } else {
            echo 'User not found!';
        }
    }
}
