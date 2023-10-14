<?php

namespace App\Http\Controllers\Company;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Http\Requests\ValidateCompany;
use LaravelLiberu\Companies\Models\Company;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateCompany $request, Company $company)
    {
        $this->authorize('update', $company);

        tap($company)->update($request->validatedExcept('mandatary'))
            ->updateMandatary($request->get('mandatary'));

        return ['message' => __('The company was successfully updated')];
    }
}
