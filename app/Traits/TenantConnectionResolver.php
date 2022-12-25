<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Api\Models\Log;

trait TenantConnectionResolver
{
    public function getConnectionName()
    {
        if (! App::runningUnitTests()) {
            if (Auth::check()) {
                $user = \Auth::user();
                $role_id = $user->role_id;
                if ($user->isAdmin()) {
                    return env('DB_DATABASE', 'enso');
                } else {
                    if (session()->get('db')) {
                        return 'tenantdb';
                    }
                }
            }
        }

        return $this->connection;
    }
}
