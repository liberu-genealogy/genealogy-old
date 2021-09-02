<?php

namespace App\Http\Controllers\Subn;

use App\Http\Requests\ValidateSubnRequest;
use App\Models\Subn;
use Illuminate\Routing\Controller;

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
