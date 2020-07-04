<?php

namespace App\Http\Controllers\enso\companies\Person;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use App\Http\Requests\enso\companies\ValidatePersonUpdate;
use App\Models\enso\companies\Company;
use App\Person;

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
