<?php

namespace App\Http\Controllers\Citation;

use App\Citation;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateCitationRequest;

class Store extends Controller
{
    public function __invoke(ValidateCitationRequest $request, Citation $citation)
    {
        tap($citation)->fill($request->validated())
            ->save();

        return [
            'message' => __('The citation was successfully created'),
            'redirect' => 'citation.edit',
            'param' => ['citation' => $citation->id],
        ];
    }
}
