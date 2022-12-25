<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\TenantConnectionResolver;
use Illuminate\Http\Request;

class Index extends Controller
{
//    use TenantConnectionResolver;
    public function getCompany()
    {
        $user = auth()->user();
        $company = $user->company();
//        $companies[] = $company;

        $companies = \LaravelEnso\Companies\Models\Company::where('created_by', $user->id)->orWhere('id', '=', $company->id)->get();

//        $new_collection = $companies->merge($companies);
//        \Log::debug(array_push($companies,$companies));
        return $companies;
    }
}
