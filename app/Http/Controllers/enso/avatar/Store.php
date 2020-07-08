<?php

namespace App\Http\Controllers\enso\Avatars;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Avatars\Http\Requests\ValidateAvatarRequest;

class Store extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateAvatarRequest $request)
    {
        $avatar = $request->user()->avatar;

        // $this->authorize('update', $avatar);

        return $avatar->store($request->file('avatar'));
    }
}
