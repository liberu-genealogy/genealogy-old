<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Core\Http\Requests\ValidateUserRequest;
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
            'redirect' => 'administration.users.edit',
            'param' => ['user' => $user->id],
        ];
    }
}
