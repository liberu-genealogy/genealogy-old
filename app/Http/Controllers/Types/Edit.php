<?php

namespace App\Http\Controllers\Types;

use App\Forms\Builders\TypeForm;
use App\Models\Type;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Type $type, TypeForm $form)
    {
        return ['form' => $form->edit($type)];
    }
}
