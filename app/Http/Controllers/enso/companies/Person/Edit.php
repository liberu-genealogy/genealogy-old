<?php

namespace App\Http\Controllers\enso\companies\Person;

use Illuminate\Routing\Controller;
use App\Person;
use App\Models\enso\companies\Company;
use App\Forms\Builders\PersonForm;

class Edit extends Controller
{
    public function __invoke(Company $company, Person $person, PersonForm $form)
    {
        return ['form' => $form->company($company)->edit($person)];
    }
}
