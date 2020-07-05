<?php

namespace App\Http\Controllers\enso\companies\Person;

use App\Forms\Builders\PersonForm;
use App\Models\enso\companies\Company;
use App\Person;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Company $company, Person $person, PersonForm $form)
    {
        return ['form' => $form->company($company)->edit($person)];
    }
}
