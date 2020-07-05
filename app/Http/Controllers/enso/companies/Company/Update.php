<?php

namespace App\Http\Controllers\enso\companies\Company;

use App\Http\Requests\enso\companies\ValidateCompanyRequest;
use App\Models\enso\companies\Company;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateCompanyRequest $request, Company $company)
    {
        $this->authorize('update', $company);

        tap($company)->update($request->validatedExcept('mandatary'))
            ->updateMandatary($request->get('mandatary'));

        return ['message' => __('The company was successfully updated')];
    }
}
