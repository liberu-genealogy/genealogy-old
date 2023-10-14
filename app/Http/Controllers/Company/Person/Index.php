<?php

namespace App\Http\Controllers\Company\Person;

use App\Models\User;
use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Http\Resources\Person as Resource;
use LaravelLiberu\Companies\Models\Company;

class Index extends Controller
{
    public function __invoke(Company $company)
    {
        // return Resource::collection($company->people);
        return Resource::collection(User::orderby('id', 'desc')->get());
    }
}
