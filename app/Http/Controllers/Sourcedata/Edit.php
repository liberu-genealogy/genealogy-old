<?php

namespace App\Http\Controllers\Sourcedata;

use App\Forms\Builders\SourceDataForm;
use App\Models\SourceData;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(SourceData $sourceData, SourceDataForm $form)
    {
        return ['form' => $form->edit($sourceData)];
    }
}
