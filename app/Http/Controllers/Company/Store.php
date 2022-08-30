<?php

namespace App\Http\Controllers\Company;

use App\Jobs\Tenant\CreateDB;
use App\Jobs\Tenant\Migration;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Http\Requests\ValidateCompany;
use LaravelEnso\Companies\Models\Company;

class Store extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateCompany $request, Company $company)
    {
        $company->fill($request->validatedExcept('mandatary'));
        $user = \Auth::user();
        $user_id = $user->id;
        $person_name = $user->name;
        $user_email = $user->email;
        $this->authorize('store', $company);

        $company->save();
        CreateDB::dispatch($company, $user_id);
        Migration::dispatch($company, $user_id, $person_name, $user_email);

        return [
            'message' => __('The company was successfully created'),
            'redirect' => 'administration.companies.edit',
            'param' => ['company' => $company->id],
        ];
    }
}
