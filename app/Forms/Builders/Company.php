<?php

namespace App\Forms\Builders;

use App\Enums\Privacy;
use App\Models\Company as Model;
use LaravelEnso\Companies\Enums\Statuses;
use LaravelEnso\Forms\Services\Form;

class Company
{
    private const TemplatePath = __DIR__.'/../Templates/company.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form($this->templatePath());
    }

    public function create()
    {
        return $this->form->readonly('mandatary')
            ->value('status', Statuses::Active)
            ->value('privacy', Privacy::Public)
            ->meta('mandatary', 'custom', false)
            ->meta('mandatary', 'placeholder', 'N/A')
            ->create();
    }

    public function edit(Model $company)
    {
        return $this->form
            ->value('mandatary', $company->mandatary()?->id)
            ->edit($company);
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }
}
