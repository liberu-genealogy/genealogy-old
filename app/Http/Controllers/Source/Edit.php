<?php

namespace App\Http\Controllers\Source;

use App\source;
use Illuminate\Routing\Controller;
use App\Forms\Builders\sourceForm;

class Edit extends Controller
{
    public function __invoke(source $source, sourceForm $form)
    {
        return ['form' => $form->edit($source)];
    }
}
