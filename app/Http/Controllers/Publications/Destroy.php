<?php

namespace App\Http\Controllers\Publications;

use App\Models\Publication;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Publication $publication)
    {
        $publication->delete();

        return [
            'message' => __('The publication was successfully deleted'),
            'redirect' => 'publications.index',
        ];
    }
}
