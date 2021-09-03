<?php

namespace App\Http\Controllers\MediaObjects;

use App\Forms\Builders\MediaObjectForm;
use App\Models\MediaObject;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(MediaObject $media_object, MediaObjectForm $form)
    {
        return ['form' => $form->edit($media_object)];
    }
}
