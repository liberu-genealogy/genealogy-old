<?php

namespace App\Http\Controllers\enso\HowTo\Tag;

use Illuminate\Routing\Controller;
use LaravelEnso\HowTo\Http\Requests\ValidateTagRequest;
use App\Models\enso\howto\Tag;

class Store extends Controller
{
    public function __invoke(ValidateTagRequest $request, Tag $tag)
    {
        return $tag->create($request->validated());
    }
}
