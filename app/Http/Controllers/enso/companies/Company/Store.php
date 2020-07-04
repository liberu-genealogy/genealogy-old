<?php

namespace App\Http\Controllers\enso\companies\Company;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use App\Http\Requests\enso\companies\ValidateCompanyRequest;
use App\Models\enso\companies\Company;

class Store extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateCompanyRequest $request, Company $company)
    {
        $company->fill($request->validatedExcept('mandatary'));

        $this->authorize('store', $company);

        $company->save();

        return [
            'message' => __('The company was successfully created'),
            'redirect' => 'administration.companies.edit',
            'param' => ['company' => $company->id],
        ];
    }
}
