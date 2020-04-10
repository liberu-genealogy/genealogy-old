<?php

namespace App\Http\Controllers\Types;

use App\Type;
use Illuminate\Routing\Controller;
use App\Forms\Builders\TypeForm;

class Edit extends Controller
{
    public function __invoke(Type $type, TypeForm $form)
    {
        return ['form' => $form->edit($type)];
    }
}
