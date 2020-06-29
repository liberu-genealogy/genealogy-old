<?php

namespace App\Http\Controllers\Personalias;

use App\PersonAlia;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonAliaRequest;

class Store extends Controller
{
    public function __invoke(ValidatePersonAliaRequest $request, PersonAlia $personAlia)
    {
        $personAlia->fill($request->validated())->save();

        return [
            'message' => __('The person alia was successfully created'),
            'redirect' => 'personalias.edit',
            'param' => ['personAlia' => $personAlia->id],
        ];
    }
}
