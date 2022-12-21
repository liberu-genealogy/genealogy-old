<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use LaravelEnso\Api\Models\Log;

trait TenantConnectionResolver
{
    public function getConnectionName()
    {
        $databaseName = \DB::connection('tenantdb')->getDatabaseName();
//        \Log::debug('DB-'.$databaseName);
//        \Log::debug($this->connection.'-connected');
        if (Auth::check()) {
            $user = \Auth::user();
            $role_id = $user->role_id;
            if ($user->isAdmin()){
                return $this->connection;
            } else {
                if (session()->get('db')) {
                    return 'tenantdb';
                }
            }
        }

        return $this->connection;
    }
}
