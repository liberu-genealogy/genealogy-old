<?php

namespace App\Http\Middleware;

use App\Service\MixedConnection;
use Closure;
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
        $db = \Session::get('db', env('DB_DATABASE'));
        $key = 'database.connections.mysql.database';
        config([$key => $db]);
        \DB::purge('mysql');
        \DB::setDefaultConnection('mysql');

        if (! $request->user()) {
            return $next($request);
        }

        // $company = $this->ownerRequestsTenant($request)
        //     ? Company::find($request->get('_tenantId'))
        //     : $request->user()->company();
        // $company = $request->user()->company();
        // $tanent = false;
        // if($company) {
        //     $tanent = true;
        // }
        // if (optional($company)->isTenant()) {
        //     Tenant::set($company);
        // }

        // MixedConnection::set(
        //     $request->user(),
        //     $tanent
        //     // $request->has('_tenantId')
        // );

        if ($request->has('_tenantId')) {
            $request->request->remove('_tenantId');
        }

        return $next($request);
    }

    private function ownerRequestsTenant($request)
    {
        return $request->has('_tenantId');
        // return $request->user()->belongsToAdminGroup()
        //     && $request->has('_tenantId');
    }
}
