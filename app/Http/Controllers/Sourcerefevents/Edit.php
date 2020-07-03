<?php

namespace App\Http\Controllers\Sourcerefevents;

use App\Forms\Builders\SourceRefEvenForm;
use App\SourceRefEven;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(SourceRefEven $sourceRefEven, SourceRefEvenForm $form)
    {
        return ['form' => $form->edit($sourceRefEven)];
    }
}
