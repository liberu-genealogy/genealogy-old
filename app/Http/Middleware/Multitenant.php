<?php

namespace App\Http\Middleware;

use App\Service\MixedConnection;
use Closure;
use LaravelEnso\Multitenancy\Services\Tenant;
// use App\Models\enso\companies\Company;
use LaravelEnso\Companies\Models\Company;
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
        $db = \Session::get('companyId');

        if (! $request->user()) {
            return $next($request);
        }

        $cid = $db;
        $company = Company::find($cid);

        $tanent = false;
        if($company) {
            $tanent = true;
        }
        
        if (optional($company)->isTenant()) {
            Tenant::set($company);
        }
                
        MixedConnection::set(
            $request->user(),
            $tanent
            // $request->has('_tenantId')
        );

        if ($request->has('_tenantId')) {
            $request->request->remove('_tenantId');
        }

        $conn = \Session::get('conn');
        $value = \Session::get('db');
        if($conn === 'tenant') {
            $key = 'database.connections.tenant.database';
            config([$key => $value]);
            $config = json_encode(config('database.connections.'.$conn));
            error_log('*****************************************************'.$config);
        }
        return $next($request);
    }

    private function ownerRequestsTenant($request)
    {
        return $request->user()->isSupervisor();
            // && $request->has('_tenantId');
    }
}
