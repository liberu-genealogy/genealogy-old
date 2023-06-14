<?php

namespace App\Http\Controllers\Stripe;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe;

class Webhook extends Controller
{
    /**
     * Handle the incoming request.
     *
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
                if ($plan->nickname === $plan_nickname) {
                    $roles= Role::where('name', strtolower($plan->nickname))->first();
                    if ($roles) {
                        $user->role_id = $roles->id;
                        $user->save();
                    }
                }
            }
        } else {
            echo 'User not found!';
        }
    }
}
