<?php

namespace App\Http\Controllers\Users;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Services\ProfileBuilder;

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
