<?php

namespace App\Http\Controllers\enso\companies\Company;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\Companies\CompanyForm;
use App\Forms\Builders\enso\Companies\CompanyFormIndi;
use App\Traits\ConnectionTrait;

class Create extends Controller
{
    use ConnectionTrait;

    public function __invoke(CompanyForm $form)
    {
        $conn = $this->getConnection();
        if($conn == 'tenant') {
            $form = new CompanyFormIndi();
            return ['form' => $form->create()];
        }
        return ['form' => $form->create()];
    }
}
