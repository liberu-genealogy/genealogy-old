<?php

namespace App\Http\Controllers\Person;

use App\Models\User;
use Illuminate\Routing\Controller;

// use LaravelEnso\People\Models\Person;

class Options extends Controller
{
    public function __invoke(User $user)
    {
        $users = User::with(['person'])->get();
        $people = [];
        foreach ($users as $user) {
            $people[] = ['name' => $user->person->name];
        }

        return $people;
    }
}
