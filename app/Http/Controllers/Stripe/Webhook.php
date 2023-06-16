<?php

namespace App\Http\Controllers\Stripe;
use LaravelEnso\Roles\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\Support\Facades\Log;

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

        if ($data) {
            switch ($data['type']) {
                case "customer.subscription.deleted": 
                    $user = User::where('stripe_id', $data['data']['object']['customer'])->first();
                    if ($user) {
                        $user->role_id = 4;
                        $user->save();
                    }
                    break;
                
                case "customer.subscription.created":
                case "customer.subscription.updated":
                    $user = User::where('stripe_id', $data['data']['object']['customer'])->first();
                    if ($user) {
                        $plan_nickname = $data['data']['object']['plan']['nickname'];
                        $roles= Role::where('name', strtolower($plan_nickname))->first();
                        if ($roles) {
                            $user->role_id = $roles->id;
                            $user->save();
                        }
                    }
                    break;
                      
                case "invoice.payment_succeeded":
                    $user = User::where('stripe_id', $data['data']['object']['customer'])->first();
                    if ($user) {
                        $plan_nickname = $data['data']['object']['lines']['data'][0]['plan']['nickname'];
                        $roles= Role::where('name', strtolower($plan_nickname))->first();
                        if ($roles) {
                            $user->role_id = $roles->id;
                            $user->save();
                        }
                    }
                    break;
                case "invoice.payment_failed" :
                    $user = User::where('stripe_id', $data['data']['object']['customer'])->first();
                    if ($user) {
                        $roles= Role::where('name', strtolower("free"))->first();
                        if ($roles) {
                            $user->role_id = $roles->id;
                            $user->save();
                        }
                    }
                    break;
            }
        } else {
            echo 'User not found!';
        }

        return true;
    }
}
