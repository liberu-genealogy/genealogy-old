<?php

namespace App\Contracts\enso\files;

use App\Models\User;

interface AuthorizesFileAccess
{
    public function viewableBy(User $user): bool;

    public function shareableBy(User $user): bool;

    public function destroyableBy(User $user): bool;
}
