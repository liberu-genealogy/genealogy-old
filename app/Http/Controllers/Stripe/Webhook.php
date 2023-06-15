<?php

namespace App\Http\Controllers\Stripe;
use LaravelEnso\Roles\Models\Role;
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
            if ($data['type'] === 'customer.subscription.deleted' || customer.subscription.deleted)
            switch ($data['type']) {
                case "customer.subscription.deleted": 
                    $user->role_id = 4;
                    $user->save();
                    break;
                case "invoice.payment_succeeded":
                case "invoice.created":
                    $subscription = $data['object']['subscription'];
                    $plan = $subscription['plan'];
                    if ($plan) {
                        $plan_nickname = $plan[['nickName']];
                        $roles= Role::where('name', strtolower($plan->nickname))->first();
                        if ($roles) {
                            $user->role_id = $roles->id;
                            $user->save();
                        }
                        break;
                            
                    }
                case "invoice.payment_failed" : 
                    $roles= Role::where('name', strtolower("free"))->first();
                    if ($roles) {
                        $user->role_id = $roles->id;
                        $user->save();
                    }
                    break;
            }
        } else {
            echo 'User not found!';
        }
    }
}
