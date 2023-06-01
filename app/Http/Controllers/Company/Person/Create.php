<?php

namespace App\Http\Controllers\Company\Person;

use App\Forms\Builders\CompaniesPerson;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Models\Company;

class Create extends Controller
{
    public function __invoke(Company $company, Person $form)
    {
        return ['form' => $form->create($company)];
    }
}
