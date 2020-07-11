<?php

namespace App\Forms\Builders\enso\Companies;

use App\Models\enso\companies\Company;
use LaravelEnso\Companies\Enums\Statuses;
use LaravelEnso\Forms\Services\Form;

class CompanyFormIndi
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/companies/companyindi.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->readonly('mandatary')
            ->value('status', Statuses::Active)
            ->meta('mandatary', 'custom', false)
            ->meta('mandatary', 'placeholder', 'N/A')
            ->create();
    }

    public function edit(Company $company)
    {
        return $this->form
            ->value('mandatary', optional($company->mandatary())->id)
            ->edit($company);
    }
}
