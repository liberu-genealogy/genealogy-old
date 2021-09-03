<?php

namespace App\Http\Controllers\Sourcedataeven;

use App\Http\Requests\ValidateSourceDataEvenRequest;
use App\Models\SourceDataEven;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateSourceDataEvenRequest $request, SourceDataEven $sourcedataeven)
    {
        $sourcedataeven->fill($request->validated())->save();

        return [
            'message' => __('The source data even was successfully created'),
            'redirect' => 'sourcedataeven.edit',
            'param' => ['sourcedataeven' => $sourcedataeven->id],
        ];
    }
}
