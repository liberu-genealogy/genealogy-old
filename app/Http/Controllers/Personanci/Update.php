<?php

namespace App\Http\Controllers\Personanci;

use App\PersonAnci;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonAnciRequest;

class Update extends Controller
{
    public function __invoke(ValidatePersonAnciRequest $request, PersonAnci $personAnci)
    {
        $personAnci->update($request->validated());

        return ['message' => __('The person anci was successfully updated')];
    }
}
