<?php

namespace App\Http\Controllers\Company\Person;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Http\Requests\ValidatePersonStore;
use LaravelLiberu\Companies\Models\Company;

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
