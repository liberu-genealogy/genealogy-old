<?php

namespace App\Http\Controllers\Sourcedataevent;

use App\Http\Requests\ValidateSourceDataEvenRequest;
use App\SourceDataEven;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateSourceDataEvenRequest $request, SourceDataEven $sourceDataEven)
    {
        $sourceDataEven->fill($request->validated())->save();

        return [
            'message' => __('The source data even was successfully created'),
            'redirect' => 'sourcedataevent.edit',
            'param' => ['sourceDataEven' => $sourceDataEven->id],
        ];
    }
}
