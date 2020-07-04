<?php

namespace App\Http\Controllers\enso\teams;

use App\Models\enso\teams\Team;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Team $team)
    {
        $team->delete();

        return ['message' => __('The team was successfully deleted')];
    }
}
