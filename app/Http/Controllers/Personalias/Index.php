<?php

namespace App\Http\Controllers\Personalias;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Person;

class Index extends Controller
{
    public function __invoke(Request $request)
    {
        //
    }

    public function getPerson()
    {
        $persons = Person::all();
        return $persons;
    }
}
