<?php

namespace App\Http\Controllers\Personlds;

use App\PersonLds;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(PersonLds $personLds)
    {
        $personLds->delete();

        return [
            'message' => __('The person lds was successfully deleted'),
            'redirect' => 'personlds.index',
        ];
    }
}
