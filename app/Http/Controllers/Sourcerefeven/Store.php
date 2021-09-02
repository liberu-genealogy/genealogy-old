<?php

namespace App\Http\Controllers\Sourcerefeven;

use App\Http\Requests\ValidateSourceRefEvenRequest;
use App\Models\SourceRefEven;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateSourceRefEvenRequest $request, SourceRefEven $sourceRefEven)
    {
        $sourceRefEven->fill($request->validated())->save();

        return [
            'message' => __('The source ref even was successfully created'),
            'redirect' => 'sourcerefeven.edit',
            'param' => ['sourceRefEven' => $sourceRefEven->id],
        ];
    }
}
