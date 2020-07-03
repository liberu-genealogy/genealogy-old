<?php

namespace App\Forms\Builders;

use App\Person;
use LaravelEnso\Forms\Services\Form;

class PersonForm extends \LaravelEnso\People\Forms\Builders\PersonForm
{
    protected const TemplatePath = __DIR__.'/../Templates/person.json';
}
