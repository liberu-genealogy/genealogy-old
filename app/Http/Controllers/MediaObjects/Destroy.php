<?php

namespace App\Http\Controllers\MediaObjects;

use App\Models\MediaObject;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(MediaObject $object)
    {
        $object->delete();

        return [
            'message' => __('The object was successfully deleted'),
            'redirect' => 'objects.index',
        ];
    }
}
