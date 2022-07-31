<?php

namespace App\Http\Controllers\Person;

use App\Http\Requests\ValidatePersonRequest;
use App\Models\Preson;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidatePerson $request, Person $person)
    {
        $this->authorize('update', [$person, $request->get('companies')]);

        tap($person)->update($request->validatedExcept('companies', 'company'))
            ->syncCompanies(
                $request->get('companies'),
                $request->get('company')
            );

        return ['message' => __('The person was successfully updated')];
    }
}
