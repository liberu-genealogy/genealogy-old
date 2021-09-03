<?php

namespace App\Http\Controllers\Personanci;

use App\Http\Requests\ValidatePersonAnciRequest;
use App\Models\PersonAnci;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidatePersonAnciRequest $request, PersonAnci $personAnci)
    {
        $personAnci->update($request->validated());

        return ['message' => __('The person anci was successfully updated')];
    }
}
