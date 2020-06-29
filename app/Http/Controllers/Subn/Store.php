<?php

namespace App\Http\Controllers\Subn;

use App\Subn;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateSubnRequest;

class Store extends Controller
{
    public function __invoke(ValidateSubnRequest $request, Subn $subn)
    {
        $subn->fill($request->validated())->save();

        return [
            'message' => __('The subn was successfully created'),
            'redirect' => 'subn.edit',
            'param' => ['subn' => $subn->id],
        ];
    }
}
