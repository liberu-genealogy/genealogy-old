<?php

namespace App\Http\Controllers\enso\teams;

use App\Models\enso\Teams\Team;
use Illuminate\Routing\Controller;
use LaravelEnso\Teams\Http\Resources\Team as Resource;

class Index extends Controller
{
    public function __invoke()
    {
        return Resource::collection(
            Team::with(['users.person', 'users.avatar'])->latest()->get()
        );
    }
}
