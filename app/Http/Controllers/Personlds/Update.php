<?php

namespace App\Http\Controllers\Personlds;

use App\PersonLds;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonLdsRequest;

class Update extends Controller
{
    public function __invoke(ValidatePersonLdsRequest $request, PersonLds $personLds)
    {
        $personLds->update($request->validated());

        return ['message' => __('The person lds was successfully updated')];
    }
}
