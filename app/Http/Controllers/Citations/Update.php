<?php

namespace App\Http\Controllers\Citations;

use App\Citation;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateCitationRequest;

class Update extends Controller
{
    public function __invoke(ValidateCitationRequest $request, Citation $citation)
    {
        $citation->update($request->validated());

        return ['message' => __('The citation was successfully updated')];
    }
}
