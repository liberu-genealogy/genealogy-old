<?php

namespace App\Http\Controllers\Sourcedataevent;

use App\SourceDataEven;
use Illuminate\Routing\Controller;
use App\Forms\Builders\SourceDataEvenForm;

class Edit extends Controller
{
    public function __invoke(SourceDataEven $sourceDataEven, SourceDataEvenForm $form)
    {
        return ['form' => $form->edit($sourceDataEven)];
    }
}
