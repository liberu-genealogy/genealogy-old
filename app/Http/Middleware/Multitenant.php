<?php

namespace App\Http\Middleware;

use Closure;

// use App\Models\liberu\companies\Company;

class Multitenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $tenatDB=\App\Models\Tenant::where('id',Auth::id())->get();
//        Log::debug();

        $user = \Auth::user();
\Session::get('conn');
        //$value = \Session::get('db');
        if ($user->isAdmin()) {
            $key = 'database.connections.mysql.database';
            $value = env('DB_DATABASE', 'liberu');
        } else {
            $key = 'database.connections.tenantdb.database';
            if (session()->get('db')) {
                $value = session()->get('db');
            } else {
                $company = $user->person->company();
                // dd($company);
                $tenants = \App\Models\Tenant::find($company->id);
                // dd($tenants);
                $value = $tenants->tenancy_db_name;
            }
        }
//            Log::debug($value);
//            Log::debug('Avatar-'.$user->avatar);
//            Log::debug($company);
        session()->put('db', $value);
        config([$key => $value]);
        \DB::connection('tenantdb')->getDatabaseName();
        // Log::debug('DB-'.$databaseName);

        //Family::setConnection();
        // config(['database.default'=>'tenant']);
        /*}/*else {
            config(['database.default'=>'mysql']);
        }*/

        /*if ($request->has('_tenantId')) {
            $request->request->remove('_tenantId');
        }*/
        return $next($request);
    }
}
