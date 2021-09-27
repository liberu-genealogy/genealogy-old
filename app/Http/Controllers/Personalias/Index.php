<?php

namespace App\Http\Controllers\Personalias;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Person;
use App\Service\Tenant;
use LaravelEnso\Multitenancy\Enums\Connections;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Index extends Controller
{
    public function __invoke(Request $request)
    {
        //
    }

    public function getPerson()
    {
        $tenant = Auth::user()->company();
        Tenant::set($tenant);
        $company = Tenant::get();
        $db = Connections::Tenant.$company->id;
        $person = DB::connection(Connections::Tenant)->table('people')->get();
        return $person;
    }
}
