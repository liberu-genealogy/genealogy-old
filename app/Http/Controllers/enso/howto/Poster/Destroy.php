<?php

namespace App\Http\Controllers\enso\HowTo\Poster;

use Illuminate\Routing\Controller;
use App\Models\enso\howto\Poster;
class Destroy extends Controller
{
    public function __invoke(Poster $poster)
    {
        $poster->delete();

        return ['message' => __('The poster was deleted successfully')];
    }
}
