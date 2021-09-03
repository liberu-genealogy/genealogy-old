<?php

namespace App\Http\Controllers\Personanci;

use App\Http\Requests\ValidatePersonAnciRequest;
use App\Models\PersonAnci;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidatePersonAnciRequest $request, PersonAnci $personAnci)
    {
        $personAnci->fill($request->validated())->save();

        return [
            'message' => __('The person anci was successfully created'),
            'redirect' => 'personanci.edit',
            'param' => ['person_anci' => $personAnci->id],
        ];
    }
}
