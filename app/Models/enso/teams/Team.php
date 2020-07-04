<?php

namespace App\Models\enso\Teams;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Core\Models\User;
use LaravelEnso\DynamicMethods\Traits\Relations;
use LaravelEnso\Rememberable\Traits\Rememberable;
use LaravelEnso\Teams\Exceptions\Team as Exception;

class Team extends Model
{
    use Relations, Rememberable;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function userIds()
    {
        return $this->users->pluck('id');
    }

    public function userList()
    {
        return $this->users->map(fn ($user) => [
            'name' => $user->person->name,
            'avatar' => $user->avatar,
        ]);
    }

    public function updateMembers(array $memberIds)
    {
        $synced = $this->users()->sync($memberIds);
        if (! empty($synced['attached']) || ! empty($synced['detached'])) {
            $this->fireModelEvent('updated-members', false);
        }
    }

    public function delete()
    {
        if ($this->users()->exists()) {
            throw Exception::users();
        }

        return parent::delete();
    }
}
