<?php

namespace App\Http\Controllers\MediaObjects;

use App\Forms\Builders\MediaObjectForm;
use App\MediaObject;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(MediaObject $object, MediaObjectForm $form)
    {
        return ['form' => $form->edit($object)];
    }
}
