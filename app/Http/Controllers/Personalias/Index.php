<?php

namespace App\Http\Controllers\Personalias;

use App\Service\Tenant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelLiberu\Multitenancy\Enums\Connections;

class Index extends Controller
{
    public function __invoke(Request $request)
    {
    }

    public function getPerson()
    {
        $tenant = Auth::user()->company();
        Tenant::set($tenant);
        $company = Tenant::get();

        return DB::connection(Connections::Tenant)->table('people')->get();
    }
}
