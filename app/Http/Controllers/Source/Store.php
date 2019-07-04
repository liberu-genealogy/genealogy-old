<?php

namespace App\Http\Controllers\Source;

use App\source;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatesourceRequest;

class Store extends Controller
{
    public function __invoke(ValidatesourceRequest $request, source $source)
    {
        tap($source)->fill($request->validated())
            ->save();

        return [
            'message' => __('The source was successfully created'),
            'redirect' => 'source.edit',
            'param' => ['source' => $source->id],
        ];
    }
}
