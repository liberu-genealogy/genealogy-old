<?php

namespace App\Http\Controllers\MediaObjects;

use App\MediaObject;
use Illuminate\Routing\Controller;
use App\Forms\Builders\MediaObjectForm;

class Edit extends Controller
{
    public function __invoke(MediaObject $object, MediaObjectForm $form)
    {
        return ['form' => $form->edit($object)];
    }
}
