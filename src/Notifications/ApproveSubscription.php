<?php

namespace Faithgen\Miscellaneous\Notifications;

use Faithgen\Miscellaneous\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApproveSubscription extends Notification implements ShouldQueue
{
    use Queueable;
    /**
     * @var Subscription
     */
    private Subscription $subscription;

    /**
     * Create a new notification instance.
     *
     * @param  Subscription  $subscription
     */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
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
                    ->line('You are receiving this notification because you are subscribing to FaithGen.')
                    ->action('Approve Subscription', url("/api/subscriptions/{$this->subscription->id}/{$this->subscription->email}"))
                    ->line('Thank you for using our application!');
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
