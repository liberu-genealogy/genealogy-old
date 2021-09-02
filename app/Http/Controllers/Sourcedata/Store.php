<?php

namespace App\Http\Controllers\Sourcedata;

use App\Http\Requests\ValidateSourceDataRequest;
use App\Models\SourceData;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateSourceDataRequest $request, SourceData $sourceData)
    {
        $sourceData->fill($request->validated())->save();

        return [
            'message' => __('The source data was successfully created'),
            'redirect' => 'sourcedata.edit',
            'param' => ['sourceData' => $sourceData->id],
        ];
    }
}
