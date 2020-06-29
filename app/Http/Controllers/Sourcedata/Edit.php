<?php

namespace App\Http\Controllers\Sourcedata;

use App\SourceData;
use Illuminate\Routing\Controller;
use App\Forms\Builders\SourceDataForm;

class Edit extends Controller
{
    public function __invoke(SourceData $sourceData, SourceDataForm $form)
    {
        return ['form' => $form->edit($sourceData)];
    }
}
