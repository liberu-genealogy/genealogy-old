<?php

namespace App\Http\Controllers\Sourcedataevent;

use App\Http\Requests\ValidateSourceDataEvenRequest;
use App\SourceDataEven;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateSourceDataEvenRequest $request, SourceDataEven $sourceDataEven)
    {
        $sourceDataEven->update($request->validated());

        return ['message' => __('The source data even was successfully updated')];
    }
}
