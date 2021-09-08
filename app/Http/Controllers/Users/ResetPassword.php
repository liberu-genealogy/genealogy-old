<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Password;

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
