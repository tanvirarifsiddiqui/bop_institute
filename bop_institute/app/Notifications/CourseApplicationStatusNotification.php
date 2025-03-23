<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CourseApplicationStatusNotification extends Notification
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
        $subject = "Course Application Status Update";
        $line = match ($this->status) {
            'approved' => 'Your course application has been approved.',
            'enrolled' => 'You have been enrolled in the course.',
            'rejected' => 'Your course application has been rejected.',
            default => 'Your course application status has been updated.',
        };

        return (new MailMessage)
            ->subject($subject)
            ->line($line)
            ->action('View Application', url('/dashboard'))
            ->line('Thank you for using our application!');
    }
}
