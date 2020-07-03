<?php

namespace App\Models\enso\core;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Rememberable\Traits\Rememberable;
use LaravelEnso\Multitenancy\Traits\SystemConnection;

class Preference extends Model
{
    use Rememberable, SystemConnection;

    protected $fillable = ['user_id', 'value'];

    protected $casts = ['value' => 'object'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
