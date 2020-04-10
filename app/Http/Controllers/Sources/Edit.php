<?php

namespace App\Http\Controllers\Sources;

use App\Source;
use Illuminate\Routing\Controller;
use App\Forms\Builders\SourceForm;

class Edit extends Controller
{
    public function __invoke(Source $source, SourceForm $form)
    {
        return ['form' => $form->edit($source)];
    }
}
