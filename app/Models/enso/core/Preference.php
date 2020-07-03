<?php

namespace App\Models\enso\core;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Rememberable\App\Traits\Rememberable;

class Preference extends Model
{
    use Rememberable;

    protected $fillable = ['user_id', 'value'];

    protected $casts = ['value' => 'object'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
