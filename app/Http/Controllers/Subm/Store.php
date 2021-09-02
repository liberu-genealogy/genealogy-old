<?php

namespace App\Http\Controllers\Subm;

use App\Http\Requests\ValidateSubmRequest;
use App\Models\Subm;
use Illuminate\Routing\Controller;

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
