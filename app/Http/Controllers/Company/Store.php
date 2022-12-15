<?php

namespace App\Http\Controllers\Company;

use App\Jobs\Tenant\CreateDB;
use App\Jobs\Tenant\Migration;
use App\Jobs\Tenant\Migrations;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
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

        $company->fill($request->validatedExcept('mandatary'));
        $clone = $request->post();
        $user = \Auth::user();
        $user_id = $user->id;
        $person_name = $user->name;
        $user_email = $user->email;
        $this->authorize('store', $company);

        $company->save();
//        if ($user->role_id!=1){
//            $c = new Company1();
//            $c->fill($clone);
//            $c->save();
////            Company1::create($clone);
//        }
        CreateDB::dispatch($company, $user_id);
        Migration::dispatch($company, $user_id, $person_name, $user_email);

        return [
            'message' => __('The company was successfully created'),
            'redirect' => 'administration.companies.edit',
            'param' => ['company' => $company->id],
        ];
    }
}
