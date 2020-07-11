<?php

namespace App\Http\Controllers\enso\people;

use App\Forms\Builders\PersonForm;
use App\Forms\Builders\PersonFormIndi;
use App\Person;
use Illuminate\Routing\Controller;
use App\Traits\ConnectionTrait;
use Auth;

class Edit extends Controller
{
    use ConnectionTrait;
    public function __invoke(Person $person, PersonForm $form)
    {
        $conn = $this->getConnection();
        if($conn === 'tenant') {
            $person = Person::find(Auth::user()->person_id);
            $form = new PersonFormIndi();
            return ['form' => $form->edit($person)];
        }
        return ['form' => $form->edit($person)];
    }
}
