<?php

namespace App\Http\Controllers\enso\companies\Person;

use App\Forms\Builders\PersonForm;
use App\Models\enso\companies\Company;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(Company $company, PersonForm $form)
    {
        return ['form' => $form->create($company)];
    }
}
