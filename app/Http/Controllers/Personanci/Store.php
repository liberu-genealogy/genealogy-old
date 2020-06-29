<?php

namespace App\Http\Controllers\Personanci;

use App\PersonAnci;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonAnciRequest;

class Store extends Controller
{
    public function __invoke(ValidatePersonAnciRequest $request, PersonAnci $personAnci)
    {
        $personAnci->fill($request->validated())->save();

        return [
            'message' => __('The person anci was successfully created'),
            'redirect' => 'personanci.edit',
            'param' => ['personAnci' => $personAnci->id],
        ];
    }
}
