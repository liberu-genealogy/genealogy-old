<?php

namespace App\Http\Controllers\Company\Person;

use App\Forms\Builders\CompaniesPerson as Form;
use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Models\Company;
use LaravelLiberu\People\Models\Person;

class Edit extends Controller
{
    public function __invoke(Company $company, Person $person, Form $form)
    {
        return ['form' => $form->company($company)->edit($person)];
    }
}
