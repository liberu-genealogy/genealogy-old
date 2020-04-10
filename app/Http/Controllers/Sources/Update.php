<?php

namespace App\Http\Controllers\Sources;

use App\Source;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateSourceRequest;

class Update extends Controller
{
    public function __invoke(ValidateSourceRequest $request, Source $source)
    {
        $source->update($request->validated());

        return ['message' => __('The source was successfully updated')];
    }
}
