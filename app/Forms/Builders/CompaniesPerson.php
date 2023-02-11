<?php

namespace LaravelEnso\Companies\Forms\Builders;

use App\Models\Company;
use LaravelEnso\Forms\Services\Form;
use LaravelEnso\People\Models\Person as Model;

class CompaniesPerson
{
    private const TemplatePath = __DIR__.'/../Templates/personCompany.json';

    protected Form $form;
    protected Company $company;

    public function __construct()
    {
        $this->form = new Form($this->templatePath());
    }

    public function create()
    {
        return $this->form
            ->actions('store')
            ->create();
    }

    public function edit(Model $person)
    {
        return $this->form->actions('update')
            ->value('position', $person->position($this->company))
            ->readonly('id')
            ->edit($person);
    }

    public function company(Company $company)
    {
        $this->company = $company;

        return $this;
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }
}
