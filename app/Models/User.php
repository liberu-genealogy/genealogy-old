<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Billable;
use LaravelEnso\Avatars\Models\Avatar;
use LaravelEnso\Users\Models\User as CoreUser;

class User extends CoreUser
{
    use Billable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'person_id',
        'group_id',
        'role_id',
        'is_active',
    ];

    public function social()
    {
        return $this->hasMany(UserSocial::class, 'user_id', 'id');
    }

    public function avatar()
    {
        return $this->hasOne(Avatar::class, 'user_id', 'id');
    }

    public function hasSocialLinked($service)
    {
        return (bool) $this->social->where('service', $service)->count();
    }

//    public function avatar()
//    {
//        return $this->hasOne(\Avatar::class);
//    }

//    private function getIdAttribute($value='')
//    {
//       $this->id=1;
//    }
}
