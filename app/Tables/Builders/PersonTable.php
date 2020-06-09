<?php

namespace App\Tables\Builders;

use App\Person;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PersonTable extends \LaravelEnso\People\App\Tables\Builders\PersonTable
{
    protected const TemplatePath = __DIR__.'/../Templates/people.json';
}
