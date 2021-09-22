<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function getCompany()
    {
        $user = auth()->user();
        $company = $user->company();
        $companies[] = $company;

        return $companies;
    }
}
