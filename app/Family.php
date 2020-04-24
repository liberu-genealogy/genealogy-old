<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\People\App\Models\Person;
use LaravelEnso\Tables\App\Traits\TableCache;

class Family extends Model
{
    use TableCache;
    protected $fillable = ['description', 'is_active', 'father_id', 'mother_id', 'type_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function person()
    {
        return $this->belongsToMany(Person::class);
    }

    public static function personList()
    {
        return Person::pluck('name')
            ->toArray();
    }
}
