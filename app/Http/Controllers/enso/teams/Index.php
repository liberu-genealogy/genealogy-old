<?php

namespace App\Http\Controllers\enso\teams;

use App\Models\enso\teams\Team;
use Illuminate\Routing\Controller;
use Laravelenso\teams\Http\Resources\Team as Resource;

class Index extends Controller
{
    public function __invoke()
    {
        return Resource::collection(
            Team::with(['users.person', 'users.avatar'])->latest()->get()
        );
    }
}
