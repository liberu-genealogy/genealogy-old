<?php

namespace App\Tables\Builders;

use App\Person;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PersonTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/people.json';

}
