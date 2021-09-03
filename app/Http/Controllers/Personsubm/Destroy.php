<?php

namespace App\Http\Controllers\Personsubm;

use App\Models\PersonSubm;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(PersonSubm $personSubm)
    {
        $personSubm->delete();

        return [
            'message' => __('The person subm was successfully deleted'),
            'redirect' => 'personsubm.index',
        ];
    }
}
