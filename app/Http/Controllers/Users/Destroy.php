<?php

namespace App\Http\Controllers\Users;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Request $request, User $user)
    {
        $this->authorize('handle', $user);

        $user->erase($request->boolean('person'));

        return [
            'message' => __('The user was successfully deleted'),
            'redirect' => 'administration.users.index',
        ];
    }
}
