<?php

namespace App\Http\Controllers\Subm;

use App\Subm;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateSubmRequest;

class Store extends Controller
{
    public function __invoke(ValidateSubmRequest $request, Subm $subm)
    {
        $subm->fill($request->validated())->save();

        return [
            'message' => __('The subm was successfully created'),
            'redirect' => 'subm.edit',
            'param' => ['subm' => $subm->id],
        ];
    }
}
