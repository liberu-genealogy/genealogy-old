<?php

namespace App\Tables\Builders;

use App\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PersonTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/people.json';

    public function query(): Builder
    {
        $role = \Auth::user()->role_id;
        $userId = \Auth::user()->id;

        if (in_array($role, [1, 2])) {
            return Person::selectRaw('
            people.id, people.name,
            people.titl AS title, people.givn, people.surn,  people.appellative, people.email, people.phone,
            people.birthday, people.deathday, CASE WHEN users.id is null THEN 0 ELSE 1 END as "user",
            companies.name as company, people.created_at
        ')->leftJoin('users', 'people.id', '=', 'users.person_id')
                ->leftJoin(
                    'company_person',
                    fn ($join) => $join
                        ->on('people.id', '=', 'company_person.person_id')
                        ->where('company_person.is_main', true)
                )->leftJoin('companies', 'company_person.company_id', 'companies.id');
        } else {
            return Person::selectRaw('
            people.id, people.name,
            people.titl AS title, people.givn, people.surn,  people.appellative, people.email, people.phone,
            people.birthday, people.deathday, CASE WHEN users.id is null THEN 0 ELSE 1 END as "user",
            companies.name as company, people.created_at
        ')->leftJoin('users', function ($join) use ($userId) {
                $join->on('people.id', '=', 'users.person_id')
                ->where('users.id', $userId);
            })
                ->leftJoin(
                    'company_person',
                    function ($join) use ($userId) {
                        $join
                        ->on('people.id', '=', 'company_person.person_id')
                        ->where('company_person.company_id', $userId)
                        ->where('company_person.is_main', true);
                    }
                )->leftJoin('companies', function ($join) use ($userId) {
                    $join->on('company_person.company_id', '=', 'companies.id')
                        ->where('companies.id', $userId);
                });
        }
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
