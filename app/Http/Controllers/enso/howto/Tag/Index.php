<?php

namespace App\Http\Controllers\enso\HowTo\Tag;

use Illuminate\Routing\Controller;
use LaravelEnso\HowTo\Http\Resources\Tag as Resource;
use App\Models\enso\howto\Tag;

class Index extends Controller
{
    public function __invoke()
    {
        return Resource::collection(Tag::all());
    }
}
