<?php

namespace App\Http\Controllers\enso\Teams;

use Illuminate\Routing\Controller;
use App\Models\enso\Teams\Team;

class Destroy extends Controller
{
    public function __invoke(Team $team)
    {
        $team->delete();

        return ['message' => __('The team was successfully deleted')];
    }
}
