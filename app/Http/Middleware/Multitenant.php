<?php

namespace App\Http\Middleware;

use App\Models\Family;
use App\Models\Tenant as T1;
use App\Models\User;
use App\Service\MixedConnection;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
// use App\Models\enso\companies\Company;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Services\Tenant;

class Multitenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $tenatDB=\App\Models\Tenant::where('id',Auth::id())->get();
//        Log::debug();

        $user = \Auth::user();
//        Log::debug($user->role_id.'-roleId');
        $conn = \Session::get('conn');
        //$value = \Session::get('db');
        if ($user->isAdmin()) {
            $key = 'database.connections.mysql.database';
            $value = env('DB_DATABASE', 'enso');
        } else {
            $key = 'database.connections.tenantdb.database';
            if (session()->get('db')) {
                $value = session()->get('db');
            } else {
                $company = $user->person->company();
                $tenants = \App\Models\Tenant::find($company->id);
                $value = $tenants->tenancy_db_name;
            }
        }
//            Log::debug($value);
//            Log::debug('Avatar-'.$user->avatar);
//            Log::debug($company);
        session()->put('db', $value);
        $x = config([$key => $value]);
        //if ($conn === 'tenant') {
        $databaseName = \DB::connection('tenantdb')->getDatabaseName();
        Log::debug('DB-'.$databaseName);

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

    private function ownerRequestsTenant($request)
    {
        return $request->user()->isSupervisor();
        // && $request->has('_tenantId');
    }
}
