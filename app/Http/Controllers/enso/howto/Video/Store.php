<?php

namespace App\Http\Controllers\enso\HowTo\Video;

use Illuminate\Routing\Controller;
use LaravelEnso\HowTo\Http\Requests\ValidateVideoRequest;
use LaravelEnso\HowTo\Models\Video;

class Store extends Controller
{
    public function __invoke(ValidateVideoRequest $request, Video $video)
    {
        return $video->store(
            $request->file('video'),
            $request->validatedExcept('video')
        );
    }
}
