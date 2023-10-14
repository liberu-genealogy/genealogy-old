<?php

namespace App\Http\Controllers\Company\Person;

use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Models\Company;

class Create extends Controller
{
    public function __invoke(Company $company, Person $form)
    {
        return ['form' => $form->create($company)];
    }
}
