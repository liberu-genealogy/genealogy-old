<?php

namespace App\Http\Controllers\enso\companies\Person;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Exceptions\Company as Exception;
use App\Person;
use App\Models\enso\companies\Company;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Company $company, Person $person)
    {
        $this->authorize('manage-people', $company);

        if (
            optional($company->mandatary())->id === $person->id
            && $company->people()->exists()
        ) {
            throw Exception::dissociateMandatary();
        }

        $person->companies()->detach($company->id);
    }
}
