<?php

namespace App\Http\Controllers\Users;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateUserRequest;
use App\Models\User;

class Store extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateUserRequest $request, User $user)
    {
        $user->fill($request->validated());

        $this->authorize('handle', $user);

        tap($user)->save()
            ->sendResetPasswordEmail();

        return [
            'message' => __('The user was successfully created'),
            'redirect' => 'administration.userrestrict.edit',
            'param' => ['user' => $user->id],
        ];
    }
}
