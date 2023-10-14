<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword;
use Laravel\Cashier\Billable;
use LaravelLiberu\Avatars\Models\Avatar;
use LaravelLiberu\Users\Models\User as CoreUser;

class User extends CoreUser
{
    use Billable, CanResetPassword;
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

    public function getNameAttribute()
    {
        return $this->person?->name;
    }

    public function hasSocialLinked($service): bool
    {
        return (bool) $this->social->where('service', $service)->count();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function convOne()
    {
        return $this->belongsTo(Conversation::class, 'user_one');
    }

    public function convTwo()
    {
        return $this->belongsTo(Conversation::class, 'user_two');
    }

    public function conversations()
    {
        return $this->convOne->merage($this->convTwo);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
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
