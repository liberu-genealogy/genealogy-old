<?php

namespace App\Http\Controllers\Personlds;

use App\PersonLds;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonLdsRequest;

class Store extends Controller
{
    public function __invoke(ValidatePersonLdsRequest $request, PersonLds $personLds)
    {
        $personLds->fill($request->validated())->save();

        return [
            'message' => __('The person lds was successfully created'),
            'redirect' => 'personlds.edit',
            'param' => ['personLds' => $personLds->id],
        ];
    }
}
