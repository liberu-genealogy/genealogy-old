<?php

namespace App\Http\Controllers\Subm;

use App\Subm;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateSubmRequest;

class Update extends Controller
{
    public function __invoke(ValidateSubmRequest $request, Subm $subm)
    {
        $subm->update($request->validated());

        return ['message' => __('The subm was successfully updated')];
    }
}
