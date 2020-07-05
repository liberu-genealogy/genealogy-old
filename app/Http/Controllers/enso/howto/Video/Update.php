<?php

namespace App\Http\Controllers\enso\HowTo\Video;

use Illuminate\Routing\Controller;
use LaravelEnso\HowTo\Http\Requests\ValidateVideoRequest;
use LaravelEnso\HowTo\Models\Video;

class Update extends Controller
{
    public function __invoke(ValidateVideoRequest $request, Video $video)
    {
        tap($video)->update($request->validatedExcept('tagList'))
            ->syncTags($request->get('tagList'));

        return ['message' => __('The video was updated successfully')];
    }
}
