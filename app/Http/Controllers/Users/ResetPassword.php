<?php

namespace App\Http\Controllers\Users;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ResetPassword extends Controller
{
    use AuthorizesRequests;

    public function __invoke(User $user)
    {
        $this->authorize('reset-password', $user);

        Password::broker()->sendResetLink($user->only('email'));

        return [
            'message' => __('We have e-mailed password reset link!'),
        ];
    }
}
