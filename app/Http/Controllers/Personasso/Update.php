<?php

namespace App\Http\Controllers\Personasso;

use App\Http\Requests\ValidatePersonAssoRequest;
use App\Models\PersonAsso;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidatePersonAssoRequest $request, PersonAsso $personAsso)
    {
        $personAsso->update($request->validated());

        return ['message' => __('The person asso was successfully updated')];
    }
}
