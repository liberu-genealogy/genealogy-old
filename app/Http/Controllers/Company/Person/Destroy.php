<?php

namespace App\Http\Controllers\Company\Person;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Exceptions\Company as Exception;
use LaravelLiberu\Companies\Models\Company;
use LaravelLiberu\People\Models\Person;

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
