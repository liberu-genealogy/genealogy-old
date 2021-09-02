<?php

namespace App\Http\Controllers\Subm;

use App\Http\Requests\ValidateSubmRequest;
use App\Models\Subm;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateSubmRequest $request, Subm $subm)
    {
        $subm->update($request->validated());

        return ['message' => __('The subm was successfully updated')];
    }
}
