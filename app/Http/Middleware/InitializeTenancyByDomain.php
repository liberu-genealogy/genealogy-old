<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InitializeTenancyByDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(in_array($request->getHost(), config('tenancy.central_domains'), true)){
return $next($request);}
return $this->initalizeTenancy($request, $next, $request->getHost());
    }
}
