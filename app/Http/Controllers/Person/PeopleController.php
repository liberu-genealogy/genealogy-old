<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\TenantPerson;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function searchPerson(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 10);

        // Don't show born under 100 years ago
        // and filter living individuals out
        $peopleQuery = TenantPerson::where('birthday', '<', Carbon::now()->subYears(100))
            ->whereNull('deathday')
            ->with(['systemPerson' => function ($query) {
                $query->select('id', 'name');
            }]);

        $words = explode(' ', $request->input('name'));

        $peopleQuery->where(function ($query) use ($words) {
            foreach ($words as $text) {
                $query->orWhere('name', 'like', '%'.$text.'%');
            }
        });

        $countQuery = clone $peopleQuery;
        $totalCount = $countQuery->count();

        if ($perPage > 0) {
            $peopleQuery->skip(($page - 1) * $perPage)
                        ->take($perPage);
        }

        $people = $peopleQuery->get();

        return response()->json([
            'response' => [
                'docs' => $people->map(function ($person) {
                    return [
                        'id' => $person->id,
                        'name' => $person->name,
                        'user_name' => $person->systemPerson?->name,
                    ];
                }),
                'number_found' => $totalCount,
            ],
        ]);
    }
}
