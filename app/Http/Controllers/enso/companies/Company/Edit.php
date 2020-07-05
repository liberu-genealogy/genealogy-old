<?php

namespace App\Http\Controllers\enso\companies\Company;

use App\Forms\Builders\enso\Companies\CompanyForm;
use App\Models\enso\companies\Company;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Company $company, CompanyForm $form)
    {
        return ['form' => $form->edit($company)];
    }
}
