<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Index extends Controller
{
    public function getCompany() {
        $user = auth()->user();
        $company = $user->Company;

        return $company;
    }
}
