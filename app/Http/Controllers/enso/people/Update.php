<?php

namespace App\Http\Controllers\enso\people;

use App\Http\Requests\ValidatePersonRequest;
use App\Person;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidatePersonRequest $request, Person $person)
    {
        // $this->authorize('update', [$person, $request->get('companies')]);
        tap($person)->update($request->validatedExcept('companies', 'company'))
            ->syncCompanies(
                $request->get('companies'),
                $request->get('company')
            );

        return ['message' => __('The person was successfully updated')];
    }
}
