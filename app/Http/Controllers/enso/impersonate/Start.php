<?php

namespace App\Http\Controllers\enso\Impersonate;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use App\Models\User;

class Start extends Controller
{
    use AuthorizesRequests;

    public function __invoke(User $user)
    {
        // $this->authorize('impersonate', $user);

        session()->put('impersonating', $user->id);

        return ['message' => __('Impersonating :user', ['user' => $user->person->name])];
    }
}
