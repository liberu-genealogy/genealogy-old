<?php

namespace App\Http\Controllers\Company\Person;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Http\Requests\ValidatePersonUpdate;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\People\Models\Person;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidatePersonUpdate $request, Person $person)
    {
        $company = Company::find($request->get('company_id'));

        $this->authorize('manage-people', $company);

        $person->companies()->updateExistingPivot(
            $company->id,
            $request->only('position')
        );

        return ['message' => __('The person has been successfully updated')];
    }
}
