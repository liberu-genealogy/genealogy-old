<?php

namespace App\Http\Controllers\Company;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Models\Company;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Company $company)
    {
        $role = \Auth::user()->role_id;
        $user_id = \Auth::user()->id;
        if (in_array($role, [1, 2])) {
            $company->delete();

            return [
                'message' => __('The company was successfully deleted'),
                'redirect' => 'administration.companies.index',
            ];
        }
        if ($user_id == $company->created_by) {
            $company->delete();

            return [
                'message' => __('The company was successfully deleted'),
                'redirect' => 'administration.companies.index',
            ];
        }

        return ['error' => __('Unauthorized')];
    }
}
