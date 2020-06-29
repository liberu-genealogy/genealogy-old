<?php

namespace App\Http\Controllers\Refn;

use App\Refn;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateRefnRequest;

class Store extends Controller
{
    public function __invoke(ValidateRefnRequest $request, Refn $refn)
    {
        $refn->fill($request->validated())->save();

        return [
            'message' => __('The refn was successfully created'),
            'redirect' => 'refn.edit',
            'param' => ['refn' => $refn->id],
        ];
    }
}
