<?php

namespace App\Http\Middleware;

use App\Service\MixedConnection;
use Closure;
use LaravelEnso\Companies\Models\Company;
// use App\Models\enso\companies\Company;
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
        $conn = \Session::get('conn');
        $value = \Session::get('db');
        if ($conn === 'tenant') {
            $key = 'database.connections.tenant.database';
            config([$key => $value]);
            config(['database.default'=>'tenant']);
        } else {
            config(['database.default'=>'mysql']);
        }

        if ($request->has('_tenantId')) {
            $request->request->remove('_tenantId');
        }

        return $next($request);
    }

    private function ownerRequestsTenant($request)
    {
        return $request->user()->isSupervisor();
        // && $request->has('_tenantId');
    }
}
