<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class StudentStatusNotification extends Notification
{
    protected $status;

    /**
     * Create a new notification instance.
     *
     * @param  string  $status
     * @return void
     */
    public function __construct(string $status)
    {
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // You could include 'database' as a channel if you want to store in DB.
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
        $subject = $this->status === 'approved'
            ? 'Your Registration is Approved'
            : 'Your Registration is Rejected';

        $line = $this->status === 'approved'
            ? 'Congratulations! Your student registration has been approved. You can now access your student portal.'
            : 'We are sorry to inform you that your student registration has been rejected. Please contact the administration for further details.';

        return (new MailMessage)
            ->subject($subject)
            ->line($line)
            ->action('Go to Dashboard', url('/dashboard'))
            ->line('Thank you for using our application!');
    }
}
