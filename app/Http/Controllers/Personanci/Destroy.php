<?php

namespace App\Http\Controllers\Personanci;

use App\PersonAnci;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(PersonAnci $personAnci)
    {
        $personAnci->delete();

        return [
            'message' => __('The person anci was successfully deleted'),
            'redirect' => 'personanci.index',
        ];
    }
}
