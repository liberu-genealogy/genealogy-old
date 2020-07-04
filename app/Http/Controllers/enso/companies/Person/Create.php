<?php

namespace App\Http\Controllers\enso\companies\Person;

use Illuminate\Routing\Controller;
use App\Forms\Builders\PersonForm;
use App\Models\enso\companies\Company;

class Create extends Controller
{
    public function __invoke(Company $company, PersonForm $form)
    {
        return ['form' => $form->create($company)];
    }
}
