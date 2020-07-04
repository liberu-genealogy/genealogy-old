<?php

namespace App\Http\Controllers\enso\companies\Person;

use App\Http\Resources\enso\people\Person as Resource;
use App\Models\enso\companies\Company;
use Illuminate\Routing\Controller;

class Index extends Controller
{
    public function __invoke(Company $company)
    {
        return Resource::collection($company->people);
    }
}
