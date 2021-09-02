<?php

namespace App\Http\Controllers\Citations;

use App\Http\Requests\ValidateCitationRequest;
use App\Models\Citation;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateCitationRequest $request, Citation $citation)
    {
        $citation->update($request->validated());

        return ['message' => __('The citation was successfully updated')];
    }
}
