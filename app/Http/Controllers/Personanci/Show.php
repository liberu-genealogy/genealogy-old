<?php

namespace App\Http\Controllers\Personanci;

use App\Models\PersonAnci;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(PersonAnci $personAnci)
    {
        return ['personAnci' => $personAnci];
    }
}
