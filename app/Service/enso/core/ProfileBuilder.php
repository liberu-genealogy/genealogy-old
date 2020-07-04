<?php

namespace App\Service\enso\core;

use App\Models\User;
use Carbon\Carbon;
use LaravelEnso\Helpers\Services\Decimals;

class ProfileBuilder
{
    private const LoginRating = 80; //TODO refactor in config

    private const ActionRating = 20;

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function set(): void
    {
        $this->user->load(
            'person:id,name,title,appellative,birthday,phone',
            'group:id,name', 'role:id,name', 'avatar:id,user_id'
        );

        $this->build();
    }

    public function build(): void
    {
        $this->user->loginCount = $this->user->logins()->count();
        $this->user->person->gender = $this->user->person->gender();
        $this->user->actionLogCount = $this->user->actionLogs()->count();
        $this->user->daysSinceMember = max(Carbon::parse($this->user->created_at)->diffInDays(), 1);
        $this->user->rating = $this->rating();
    }

    private function rating(): int
    {
        $loginRatio = Decimals::div($this->user->loginCount, $this->user->daysSinceMember);
        $loginRating = Decimals::mul(self::LoginRating, $loginRatio);
        $actionRatio = Decimals::div($this->user->actionLogCount, $this->user->daysSinceMember);
        $actionRating = Decimals::mul(self::ActionRating, $actionRatio);
        $total = Decimals::add($loginRating, $actionRating);

        return (int) Decimals::div($total, 100);
    }
}
