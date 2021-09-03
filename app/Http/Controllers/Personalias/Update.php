<?php

namespace App\Http\Controllers\Personalias;

use App\Http\Requests\ValidatePersonAliaRequest;
use App\Models\PersonAlia;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidatePersonAliaRequest $request, PersonAlia $personAlia)
    {
        $personAlia->update($request->validated());

        return ['message' => __('The person alia was successfully updated')];
    }
}
