<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Event;
use App\Http\Requests\enso\Core\ValidateUserRequest;
use Illuminate\Support\Facades\Hash;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateUserRequest $request, User $user)
    {
        // $this->authorize('handle', $user);


        $user->fill($request->validated());
        if ($request->filled('password')) {
            // $this->authorize('change-password', $user);
            $user->password = Hash::make($request->get('password'));
        }

        if ($user->isDirty('group_id')) {
            $this->authorize('change-group', $user);
        }

        if ($user->isDirty('role_id')) {
            $this->authorize('change-role', $user);
        }

        $user->save();

        if ((new Collection($user->getChanges()))->keys()->contains('password')) {
            Event::dispatch(new PasswordReset($user));
        }

        return ['message' => __('The user was successfully updated')];
    }
}
