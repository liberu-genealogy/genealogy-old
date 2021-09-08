<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Services\ProfileBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    use AuthorizesRequests;

    public function __invoke(User $user)
    {
        $this->authorize('profile', $user);

        (new ProfileBuilder($user))->set();

        return ['user' => $user];
    }
}
