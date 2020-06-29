<?php

namespace App\Http\Controllers\Personasso;

use App\PersonAsso;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonAssoRequest;

class Update extends Controller
{
    public function __invoke(ValidatePersonAssoRequest $request, PersonAsso $personAsso)
    {
        $personAsso->update($request->validated());

        return ['message' => __('The person asso was successfully updated')];
    }
}
