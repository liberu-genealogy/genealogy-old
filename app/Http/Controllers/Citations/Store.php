<?php

namespace App\Http\Controllers\Citations;

use App\Citation;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateCitationRequest;

class Store extends Controller
{
    public function __invoke(ValidateCitationRequest $request, Citation $citation)
    {
        $citation->fill($request->validated())->save();

        return [
            'message' => __('The citation was successfully created'),
            'redirect' => 'citations.edit',
            'param' => ['citation' => $citation->id],
        ];
    }
}
