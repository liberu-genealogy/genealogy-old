<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\TenantPerson;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeopleController extends Controller
{
    public function searchPerson(Request $request)
    {
        // Don't show born under 100 years ago
        // and filter living individuals out
        $peopleQuery = TenantPerson::where("birthday", ">", Carbon::now()->subYears(100))
            ->whereNotNull("deathday")
            ->with([ "person" => function ($query) {
                $query->select('id', 'name');
            }])
            ->limit(100);

        foreach (explode(" ", $request->input('name')) as $text) {
            $peopleQuery->where('name', 'like', '%'.$text."%");
        }

        $people = $peopleQuery->get();

        return response()->json($people->map(function($person) {
            return $person;
        }));
    }
}
