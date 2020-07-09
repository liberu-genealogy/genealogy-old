<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateProfileRequest;

class Update extends Controller
{
    public function __invoke(ValidateProfileRequest $request, User $profile)
    {
        $profile->update($request->validated());

        return ['message' => __('The profile was successfully updated')];
    }
}
