<?php

namespace App\Http\Controllers\Person;

use App\Http\Requests\ValidatePersonRequest;
use App\Models\Person;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidatePersonRequest $request, Person $person)
    {
        $this->authorize('store', [$person, $request->get('companies')]);

        $person->fill($request->validatedExcept('companies', 'company'))->save();

        $person->syncCompanies(
            $request->get('companies'),
            $request->get('company')
        );

        return [
            'message' => __('The person was successfully created'),
            'redirect' => 'administration.people.edit',
            'param' => ['person' => $person->id],
        ];
    }
}
