<?php

namespace App\Http\Middleware;

use App\Service\MixedConnection;
use Closure;
use LaravelEnso\Companies\Models\Company;
// use App\Models\enso\companies\Company;
use LaravelEnso\Multitenancy\Enums\Connections;
use LaravelEnso\Multitenancy\Services\Tenant;


use App\Traits\ConnectionTrait;
class Multitenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    use ConnectionTrait;
    public function handle($request, Closure $next)
    {

        $userId = \Auth::user();
        $company_id = $userId->id;
        $conn = \Session::get('conn');
        $value = \Session::get('db');
        if ($conn === 'tenant') {
            $key = 'database.connections.tenant.database';
            config([$key => $value]);
            // config(['database.default'=>'tenant']);
        }
        /*else {
            config(['database.default'=>'mysql']);
        }*/
        $tree_id = $request->get('tree_id');
        if (! empty($company_id)) {
            $db = 'tenants_'.$company_id;
            $key = 'database.connections.tenant.database';
//            config([$key => $db]);
           \Config::set($key, $db);
            \Session::put('conn', $key);
            \Session::put('db', $db);
//            Tenant::set($this->tenant);
            \DB::purge('tenantdb');
            \DB::reconnect('tenantdb');

//            $db = Connections::Tenant.$company_id.'_'.$tree_id;
//            $this->setConnection(Connections::Tenant, $db);
        } else {
            $this->setConnection('mysql');
        }
//        $changeConn = $this->getConnection();
//      echo $databaseName = \DB::connection()->getDatabaseName();

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
