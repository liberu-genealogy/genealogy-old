<?php

namespace App\Http\Controllers\Sources;

use App\Http\Requests\ValidateSourceRequest;
use App\Models\Source;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateSourceRequest $request, Source $source)
    {
        $source->fill($request->validated())->save();

        return [
            'message' => __('The source was successfully created'),
            'redirect' => 'sources.edit',
            'param' => ['source' => $source->id],
        ];
    }
}
