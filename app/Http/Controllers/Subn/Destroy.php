<?php

namespace App\Http\Controllers\Subn;

use App\Models\Subn;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Subn $subn)
    {
        $subn->delete();

        return [
            'message' => __('The subn was successfully deleted'),
            'redirect' => 'subn.index',
        ];
    }
}
