<?php

namespace App\Http\Controllers\Company\Person;

use App\Models\User;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Http\Resources\Person as Resource;
use LaravelEnso\Companies\Models\Company;

class Index extends Controller
{
    public function __invoke(Company $company)
    {
        // return Resource::collection($company->people);
        return Resource::collection(User::orderby('id', 'desc')->get());
    }
}
