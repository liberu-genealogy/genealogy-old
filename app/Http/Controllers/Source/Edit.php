<?php

namespace App\Http\Controllers\Source;

use App\source;
use App\Forms\Builders\sourceForm;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(source $source, sourceForm $form)
    {
        return ['form' => $form->edit($source)];
    }
}
