<?php

namespace App\Http\Controllers\Sourcerefevents;

use App\Http\Requests\ValidateSourceRefEvenRequest;
use App\SourceRefEven;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateSourceRefEvenRequest $request, SourceRefEven $sourceRefEven)
    {
        $sourceRefEven->update($request->validated());

        return ['message' => __('The source ref even was successfully updated')];
    }
}
