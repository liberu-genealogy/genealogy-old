<?php

namespace App\Http\Controllers\Dna;

use App\Models\Dna;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Dna $addr)
    {
        $addr->delete();

        return [
            'message' => __('The DNA was successfully deleted'),
            'redirect' => 'dna.index',
        ];
    }
}
