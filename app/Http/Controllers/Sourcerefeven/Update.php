<?php

namespace App\Http\Controllers\Sourcerefeven;

use App\Http\Requests\ValidateSourceRefEvenRequest;
use App\Models\SourceRefEven;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateSourceRefEvenRequest $request, SourceRefEven $sourceRefEven)
    {
        $sourceRefEven->update($request->validated());

        return ['message' => __('The source ref even was successfully updated')];
    }
}
