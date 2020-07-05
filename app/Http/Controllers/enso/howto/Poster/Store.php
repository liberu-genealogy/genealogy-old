<?php

namespace App\Http\Controllers\enso\HowTo\Poster;

use Illuminate\Routing\Controller;
use LaravelEnso\HowTo\Http\Requests\ValidatePosterRequest;
use App\Models\enso\howto\Poster;

class Store extends Controller
{
    public function __invoke(ValidatePosterRequest $request, Poster $poster)
    {
        return $poster->store(
            $request->get('videoId'),
            $request->file('poster')
        );
    }
}
