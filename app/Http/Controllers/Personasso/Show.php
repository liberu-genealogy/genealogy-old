<?php

namespace App\Http\Controllers\Personasso;

use App\Models\PersonAsso;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(PersonAsso $personAsso)
    {
        return ['personAsso' => $personAsso];
    }
}
