<?php

namespace App\Models;

//use LaravelEnso\People\Models\Person as CorePerson;
use Illuminate\Database\Eloquent\Model;

class TenantPerson extends Model
{
    protected $casts = [
        'deleted_at' => 'datetime',
        'birthday' => 'datetime',
        'deathday' => 'datetime',
        'burial_day' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $connection = 'mysql';

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = ['tenant_person_id', 'tenant_id', 'name', 'appellative', 'nin', 'email',
        'phone', 'birthday', 'birth_month', 'birth_year', 'deathday', 'death_month', 'death_year',
        'burial_day', 'burial_month', 'burial_year', 'bank', 'bank_account', 'notes', 'gid', 'givn',
        'surn', 'uid', 'type', 'npfx', 'nick', 'spfx', 'nsfx', 'sex', 'description',
        'child_in_family_id', 'deleted_at', 'chan', 'rin', 'resn', 'rfn', 'afn', 'birthday_dati',
        'birthday_plac', 'deathday_dati', 'deathday_plac', 'deathday_caus', 'burial_day_dati',
        'burial_day_plac', 'famc', 'fams', 'titl', 'chr', 'created_at', 'updated_at'];
}
