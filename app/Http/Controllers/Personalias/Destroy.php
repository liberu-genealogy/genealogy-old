<?php

namespace App\Http\Controllers\Personalias;

use App\Models\PersonAlia;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(PersonAlia $personAlia)
    {
        $personAlia->delete();

        return [
            'message' => __('The person alia was successfully deleted'),
            'redirect' => 'personalias.index',
        ];
    }
}
