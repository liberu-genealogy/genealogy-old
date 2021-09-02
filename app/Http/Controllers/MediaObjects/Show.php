<?php

namespace App\Http\Controllers\MediaObjects;

use App\Models\MediaObject;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(MediaObject $media_object)
    {
        return ['media_object' => $media_object];
    }
}
