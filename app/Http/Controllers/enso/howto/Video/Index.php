<?php

namespace App\Http\Controllers\enso\HowTo\Video;

use Illuminate\Routing\Controller;
use LaravelEnso\HowTo\Http\Resources\Video as Resource;
use LaravelEnso\HowTo\Models\Video;

class Index extends Controller
{
    public function __invoke()
    {
        return Resource::collection(
            Video::with(['poster', 'tags'])->get()
        );
    }
}
