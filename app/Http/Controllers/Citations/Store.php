<?php

namespace App\Http\Controllers\Citations;

use App\Http\Requests\ValidateCitationRequest;
use App\Models\Citation;
use Illuminate\Routing\Controller;

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
