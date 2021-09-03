<?php

namespace App\Http\Controllers\Personlds;

use App\Http\Requests\ValidatePersonLdsRequest;
use App\Models\PersonLds;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidatePersonLdsRequest $request, PersonLds $personLds)
    {
        $personLds->fill($request->validated())->save();

        return [
            'message' => __('The person lds was successfully created'),
            'redirect' => 'personlds.edit',
            'param' => ['person_lds' => $personLds->id],
        ];
    }
}
