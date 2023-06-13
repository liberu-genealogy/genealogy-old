<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Notifications\UnsubscribeSuccessfully;
use Illuminate\Http\Request;

class Unsubscribe extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $user->subscription('default')->cancelNow();

        // $user->role_id = 3; //expired role
        //$user->save();
        $user->notify(new UnsubscribeSuccessfully($user->subscription()->stripe_price));

        return ['success' => true];
    }
}
