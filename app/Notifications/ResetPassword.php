<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;

class ResetPassword extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public $token)
    {
    }

    public function via()
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $appName = Config::get('app.name');
        $baseUrl = env('CLIENT_BASE_URL');
        $url = $baseUrl.'/password/reset?token='.$this->token.'&email='.$notifiable->email;

        return (new MailMessage())
            ->subject("[ {$appName} ] {$this->title()}")
            ->markdown('laravel-liberu/core::emails.reset', [
                'name' => $notifiable->person->name,
                'url' => $url,
            ]);
    }

    private function title(): string
    {
        return __('Reset password request');
    }
}
