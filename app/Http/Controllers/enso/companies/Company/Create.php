<?php

namespace App\Http\Controllers\enso\companies\Company;

use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Forms\Builders\CompanyForm;

class Create extends Controller
{
    public function __invoke(CompanyForm $form)
    {
        return ['form' => $form->create()];
    }
}
