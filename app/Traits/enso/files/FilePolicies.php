<?php

namespace App\Traits\enso\files;

use App\Models\User;

trait FilePolicies
{
    public function viewableBy(User $user): bool
    {
        return $user->can('view', $this);
    }

    public function shareableBy(User $user): bool
    {
        return $user->can('share', $this);
    }

    public function destroyableBy(User $user): bool
    {
        return $user->can('destroy', $this);
    }
}
