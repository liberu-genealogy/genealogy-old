<?php

namespace App\Http\Controllers\Company\Person;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Exceptions\Company as Exception;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\People\Models\Person;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Company $company, Person $person)
    {
        $this->authorize('manage-people', $company);

        $isMandatary = $company->mandatary()?->id === $person->id
            && $company->people()->exists();

        if ($isMandatary) {
            throw Exception::dissociateMandatary();
        }

        $person->companies()->detach($company->id);
    }
}
