<?php

namespace App\Http\Controllers\Sourcedataeven;

use App\Forms\Builders\SourceDataEvenForm;
use App\Models\SourceDataEven;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(SourceDataEven $sourceDataEven, SourceDataEvenForm $form)
    {
        return ['form' => $form->edit($sourceDataEven)];
    }
}
