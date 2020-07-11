<?php

namespace App\Tables\Builders\enso\Companies;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Tables\Contracts\Table;
use Auth;

class CompanyTableIndi implements Table
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/company/companies.json';

    public function query(): Builder
    {
        return Company::selectRaw('
            companies.id, companies.name,  companies.fiscal_code,  people.name as mandatary,
            companies.email, companies.website, companies.bank,  companies.pays_vat, 
            companies.phone,  companies.status, companies.is_tenant, companies.created_at
        ')->leftJoin(
            'company_person',
            fn ($join) => $join
                ->on('companies.id', '=', 'company_person.company_id')
        )->leftJoin('people', 'company_person.person_id', '=', 'people.id')
        ->where('company_person.person_id', Auth::user()->person_id);
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
