<?php

namespace App\Http\Controllers\Personasso;

use App\Models\PersonAsso;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(PersonAsso $personAsso)
    {
        $personAsso->delete();

        return [
            'message' => __('The person asso was successfully deleted'),
            'redirect' => 'personasso.index',
        ];
    }
}
