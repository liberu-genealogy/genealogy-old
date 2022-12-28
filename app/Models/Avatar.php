<?php

namespace App\Models;

use App\Traits\TenantConnectionResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends \LaravelEnso\Avatars\Models\Avatar
{
    use HasFactory;
    use TenantConnectionResolver;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
