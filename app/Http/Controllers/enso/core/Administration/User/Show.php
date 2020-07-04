<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Service\enso\core\ProfileBuilder;

class Show extends Controller
{
    public function __invoke(User $user)
    {
        (new ProfileBuilder($user))->set();

        return ['user' => $user];
    }
}
