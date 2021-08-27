<?php

namespace App\Tables\Builders;

use App\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PersonTable extends \LaravelEnso\People\Tables\Builders\PersonTable
{
    protected const TemplatePath = __DIR__.'/../Templates/people.json';

    public function query(): Builder
    {
        return Person::selectRaw('
            people.id
            , people.title, people.givn, people.surn,  people.appellative, people.email, people.phone,
            people.birthday, people.deathday, CASE WHEN users.id is null THEN 0 ELSE 1 END as "user",
            companies.name as company, people.created_at
        ')->leftJoin('users', 'people.id', '=', 'users.person_id')
            ->leftJoin(
                'company_person',
                fn ($join) => $join
                    ->on('people.id', '=', 'company_person.person_id')
                    ->where('company_person.is_main', true)
            )->leftJoin('companies', 'company_person.company_id', 'companies.id');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
