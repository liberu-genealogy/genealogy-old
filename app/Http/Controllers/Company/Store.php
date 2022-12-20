<?php

namespace App\Http\Controllers\Company;

use App\Jobs\Tenant\CreateDBs;
use App\Jobs\Tenant\Migrations;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Api\Models\Log;
use LaravelEnso\Companies\Http\Requests\ValidateCompany;
use LaravelEnso\Companies\Models\Company;
use \App\Traits\TenantConnectionResolver;
use App\Models\Company as Company1;
class Store extends Controller
{
    use AuthorizesRequests;
    use TenantConnectionResolver;
    public function __invoke(ValidateCompany $request, Company $company)
    {
        $role = \Auth::user()->role_id;
        $companies = \Auth::user()->person->companies()->count();
        if (in_array($role, [4, 5, 6]) && $companies <= 1) {

            $company->fill($request->validatedExcept('mandatary'));
            $clone = $request->post();
            $user = \Auth::user();
            $user_id = $user->id;
            $person_name = $user->name;
            $user_email = $user->email;
            $this->authorize('store', $company);

            $company->save();
            if ($user->role_id != 1) {

                $c = new Company1();

                $c->fill($clone);

                $c->setAttribute('created_by', 1);
                $c->setAttribute('updated_by', 1);
                $c->save();

            }
            CreateDBs::dispatch($company, $user_id);
//            $company = Company::find($company->id);
            Migrations::dispatch($company, $user_id, $person_name, $user_email);
            return [
                'message' => __('The company was successfully created'),
                'redirect' => 'administration.companies.edit',
                'param' => ['company' => $company->id],
            ];
        }else{
            return ['error' => __('Unauthorized')];
        }

    }
}
