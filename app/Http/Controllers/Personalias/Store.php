<?php

namespace App\Http\Controllers\Personalias;

use App\Http\Requests\ValidatePersonAliaRequest;
use App\Models\PersonAlia;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidatePersonAliaRequest $request, PersonAlia $personAlia)
    {
        $personAlia->fill($request->validated())->save();

        return [
            'message' => __('The person alia was successfully created'),
            'redirect' => 'personalias.edit',
            'param' => ['person_alia' => $personAlia->id],
        ];
    }
}
