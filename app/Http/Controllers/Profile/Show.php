<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Routing\Controller;
use App\Service\enso\core\ProfileBuilder;

use Auth;
class Show extends Controller
{
    public function __invoke(User $profile)
    {
        $profile = Auth::user();
        (new ProfileBuilder($profile))->set();
        return ['user' => $profile];
    }
}