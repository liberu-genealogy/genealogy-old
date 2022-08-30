<?php

namespace App\Http\Controllers\Company;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Forms\Builders\Company as Form;
use LaravelEnso\Companies\Models\Company;

class Edit extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Company $company, Form $form)
    {
        $role = \Auth::user()->role_id;
        $user_id = \Auth::user()->id;
        if (in_array($role, [1, 2])) {
            return ['form' => $form->edit($company)];
        }
        if ($user_id == $company->created_by) {
            return ['form' => $form->edit($company)];
        }

        return ['error' => __('Unauthorized')];
    }
}
