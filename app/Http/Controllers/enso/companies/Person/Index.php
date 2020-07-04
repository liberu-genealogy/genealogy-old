<?php

namespace App\Http\Controllers\enso\companies\Person;

use Illuminate\Routing\Controller;
use App\Http\Resources\enso\people\Person as Resource;
use App\Models\enso\companies\Company;

class Index extends Controller
{
    public function __invoke(Company $company)
    {
        return Resource::collection($company->people);
    }
}
