<?php

namespace App\Http\Controllers\Sourcedata;

use App\SourceData;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateSourceDataRequest;

class Update extends Controller
{
    public function __invoke(ValidateSourceDataRequest $request, SourceData $sourceData)
    {
        $sourceData->update($request->validated());

        return ['message' => __('The source data was successfully updated')];
    }
}
