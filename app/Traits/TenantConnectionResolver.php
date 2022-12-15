<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use LaravelEnso\Api\Models\Log;

trait TenantConnectionResolver
{
    public function getConnectionName()
    {
        \Log::debug($this->connection.'admin-connected');
        if (Auth::check()) {
            $user = \Auth::user();
            $role_id = $user->role_id;
            if ($role_id == 1) {
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
