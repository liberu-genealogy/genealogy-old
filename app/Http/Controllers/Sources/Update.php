<?php

namespace App\Http\Controllers\Sources;

use App\Http\Requests\ValidateSourceRequest;
use App\Models\Source;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateSourceRequest $request, Source $source)
    {
        $source->update($request->validated());

        return ['message' => __('The source was successfully updated')];
    }
}
