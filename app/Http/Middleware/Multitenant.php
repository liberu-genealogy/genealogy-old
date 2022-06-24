<?php

// use Closure;
// use LaravelEnso\Companies\Models\Company;
// use LaravelEnso\Multitenancy\Services\MixedConnection;
// use LaravelEnso\Multitenancy\Services\Tenant;

namespace App\Http\Middleware;

use App\Service\MixedConnection;
use App\Service\Tenant;
use Closure;
use LaravelEnso\Companies\Models\Company;
// use App\Models\enso\companies\Company;
// use LaravelEnso\Multitenancy\Services\Tenant;


class Multitenant
{
    public function handle($request, Closure $next)
    {
        if (! $request->user()) {
            return $next($request);
        }

        $company = $this->ownerRequestsTenant($request)
            ? Company::find($request->get('_tenantId'))
            : $request->user()->company();

        if (optional($company)->isTenant()) {
            Tenant::set($company);
        }

        $conn = \Session::get('conn') === "tenant";
        // $value = \Session::get('db');

        MixedConnection::set(
            $request->user(),
            // $request->has('_tenantId')
            $conn
        );

        if ($request->has('_tenantId')) {
            $request->request->remove('_tenantId');
        }
        error_log("Connection-".($conn));

        return $next($request);
    }

    private function ownerRequestsTenant($request)
    {
        return $request->user()->belongsToAdminGroup()
            && $request->has('_tenantId');
    }
}
