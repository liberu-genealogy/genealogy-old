<?php

namespace App\Http\Controllers\Person;

use App\Models\Person;
use Illuminate\Routing\Controller;

class GetPersons extends Controller
{
    public function __invoke()
    {
        return Person::get();
    }

    public function getPersons()
    {
        return Person::get();
    }
}
