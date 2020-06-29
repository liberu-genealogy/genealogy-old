<?php

namespace App\Http\Controllers\Personalias;

use App\PersonAlia;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonAliaRequest;

class Update extends Controller
{
    public function __invoke(ValidatePersonAliaRequest $request, PersonAlia $personAlia)
    {
        $personAlia->update($request->validated());

        return ['message' => __('The person alia was successfully updated')];
    }
}
