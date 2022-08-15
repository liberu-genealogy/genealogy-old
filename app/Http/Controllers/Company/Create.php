<?php

namespace App\Http\Controllers\Company;

use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Forms\Builders\Company;

class Create extends Controller
{
    public function __invoke(Company $form)
    {

        {
            $role = \Auth::user()->role_id;
            $companies = \Auth::user->companies->count();
            if (in_array($role, [1, 2, 8, 9])) {
                return ['form' => $form->create()]
            }
            if (in_array($role, [4, 5]) && $companies < 1) {
                return ['form' => $form->create()]
            }

            if (in_array($role, [6, 7]) && $companies < 10) {
                return ['form' => $form->create()]
            }

            return ['error' => __('Unauthorized')];
        };
    }
}
