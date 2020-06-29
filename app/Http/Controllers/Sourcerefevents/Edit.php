<?php

namespace App\Http\Controllers\Sourcerefevents;

use App\SourceRefEven;
use Illuminate\Routing\Controller;
use App\Forms\Builders\SourceRefEvenForm;

class Edit extends Controller
{
    public function __invoke(SourceRefEven $sourceRefEven, SourceRefEvenForm $form)
    {
        return ['form' => $form->edit($sourceRefEven)];
    }
}
