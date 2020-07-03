<?php

namespace App\Http\Controllers\Sourcerefevents;

use App\Http\Requests\ValidateSourceRefEvenRequest;
use App\SourceRefEven;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateSourceRefEvenRequest $request, SourceRefEven $sourceRefEven)
    {
        $sourceRefEven->fill($request->validated())->save();

        return [
            'message' => __('The source ref even was successfully created'),
            'redirect' => 'sourcerefevents.edit',
            'param' => ['sourceRefEven' => $sourceRefEven->id],
        ];
    }
}
