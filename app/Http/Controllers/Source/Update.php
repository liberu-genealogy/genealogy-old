<?php

namespace App\Http\Controllers\Source;

use App\source;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatesourceRequest;

class Update extends Controller
{
    public function __invoke(ValidatesourceRequest $request, source $source)
    {
        $source->update($request->validated());

        return ['message' => __('The source was successfully updated')];
    }
}
