<?php

namespace App\Http\Controllers\enso\companies\Company;

use App\Http\Requests\enso\companies\ValidateCompanyRequest;
use App\Models\enso\companies\Company;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use App\Traits\ConnectionTrait;
use Auth;
use App\Jobs\Tenant\CreateDB;
use App\Jobs\Tenant\Migration;

class Store extends Controller
{
    use AuthorizesRequests, ConnectionTrait;

    public function __invoke(ValidateCompanyRequest $request, Company $company)
    {
        $request->merge(['mandatary'=>true]);
        $company->fill($request->validatedExcept('mandatary'));

        // $this->authorize('store', $company);
        
        $company->save();
        $conn = $this->getConnection();
        if($conn === 'tenant') {
            $person_id = Auth::user()->person_id;
            $email = Auth::user()->email;
            $company->email = $email;
            $company->save();
            $company->attachPerson($person_id);
            $company_id = $company->id;
            // create database
            CreateDB::dispatch($company);
            Migration::dispatch($company, Auth::user()->name, Auth::user()->email, '123123');
        }
        // attachPerson
        return [
            'message' => __('The company was successfully created'),
            'redirect' => 'administration.companies.edit',
            'param' => ['company' => $company->id],
        ];
    }
}
