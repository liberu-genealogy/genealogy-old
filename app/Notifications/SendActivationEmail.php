<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendActivationEmail extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * SendActivationEmail constructor.
     *
     * @param  $token
     */
    public function __construct(protected $token)
    {
        // $this->onQueue('social');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via(mixed $notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(mixed $notifiable)
    {
        $baseUrl = env('APP_URL');
        $url = $baseUrl.'/verify?token='.$this->token;
        $message = new MailMessage();
        $message->subject(trans('emails.activationSubject'))
            ->greeting(trans('emails.activationGreeting'))
            ->line(trans('emails.activationMessage'))
            ->action(trans('emails.activationButton'), $url)
            ->line($this->token)
            ->line(trans('emails.activationThanks'));

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray(mixed $notifiable)
    {
        return [

        ];
    }
}
