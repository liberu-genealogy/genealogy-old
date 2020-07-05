<?php

namespace App\Http\Controllers\enso\HowTo\Tag;

use Illuminate\Routing\Controller;
use App\Models\enso\howto\Tag;

class Destroy extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();
    }
}
