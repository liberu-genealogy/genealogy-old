<?php

namespace App\Http\Controllers\Sources;

use App\Forms\Builders\SourceForm;
use App\Models\Source;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Source $source, SourceForm $form)
    {
        return ['form' => $form->edit($source)];
    }
}
