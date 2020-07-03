<?php

namespace App\Forms\Builders;

use App\Person;
use LaravelEnso\Forms\App\Services\Form;

class PersonForm extends \LaravelEnso\People\App\Forms\Builders\PersonForm
{
    protected const TemplatePath = __DIR__.'/../Templates/person.json';
}
