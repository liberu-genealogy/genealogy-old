<?php

namespace App\Http\Controllers\enso\HowTo\Video;

use Illuminate\Routing\Controller;
use LaravelEnso\HowTo\Models\Video;

class Destroy extends Controller
{
    public function __invoke(Video $video)
    {
        $video->delete();

        return ['message' => __('The video file was deleted successfully')];
    }
}
