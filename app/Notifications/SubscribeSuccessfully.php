<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscribeSuccessfully extends Notification
{
    use Queueable;

    protected $plan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($plan_id)
    {
        $stripe = new \Stripe\StripeClient(\Config::get('services.stripe.secret'));
        if (is_array($plan_id)) {
            $this->plan = $stripe->plans->retrieve($plan_id['planId']);
        } else {
            $this->plan = $stripe->plans->retrieve($plan_id);
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('subscribed Successfully!')
                    ->line('You have subscribed successfully!')
                    ->line('Subscription Plan:'.$this->plan->nickname)
                    ->line('Thank you for using Genealogia!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
