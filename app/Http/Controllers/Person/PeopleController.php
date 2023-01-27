<?php

namespace App\Http\Controllers\Person;

use App\Forms\Builders\PersonForm;
use App\Models\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function searchPerson(Request $request)
    {
        $authCode = $request->authcode;
        $client = new \GuzzleHttp\Client();
        $persons = Person::all();

        return response()->json($persons);
    }
}
