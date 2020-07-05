<?php

namespace App\Http\Controllers\enso\companies\Person;

use App\Models\enso\companies\Company;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Http\Requests\ValidatePersonStore;

class Store extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidatePersonStore $request)
    {
        $company = Company::find($request->get('company_id'));
        $personId = $request->get('id');

        $this->authorize('manage-people', $company);

        $company->attachPerson($personId, $request->get('position'));

        return ['message' => __('The person was successfully assigned')];
    }
}
