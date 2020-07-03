<?php

namespace App\Events\enso\core;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class Login
{
    use Dispatchable, SerializesModels;

    private User $user;
    private string $ip;
    private string $userAgent;

    public function __construct(User $user, string $ip, string $userAgent)
    {
        $this->user = $user;
        $this->ip = $ip;
        $this->userAgent = $userAgent;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function ip(): string
    {
        return $this->ip;
    }

    public function userAgent(): string
    {
        return $this->userAgent;
    }
}
