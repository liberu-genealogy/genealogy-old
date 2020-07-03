<?php

namespace App\Traits\enso\avatars;

use App\Models\enso\Avatars\Avatar;
use App\Service\enso\avatars\DefaultAvatar;

trait HasAvatar
{
    public static function bootHasAvatar()
    {
        self::created(fn ($model) => $model->generateAvatar());
    }

    public function avatar()
    {
        return $this->hasOne(Avatar::class);
    }

    public function generateAvatar(): Avatar
    {
        optional($this->avatar)->delete();

        return (new DefaultAvatar($this))->create();
    }
}
