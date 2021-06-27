<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AnnouncementNotification extends Notification
{
    use Queueable;

    protected $announcement;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($announcement)
    {
        $this->announcement = $announcement;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'announcement_title' => $this->announcement->announcement_title,
            'affected_employees' => $this->announcement->affected_employees,
            'date_from' => $this->announcement->date_from,
            'time_from' => $this->announcement->time_from,
            'date_to' => $this->announcement->date_to,
            'time_to' => $this->announcement->time_to,
            'announcement_description' => $this->announcement->announcement_description,
            'link' => $this->announcement->link,
            'attachment' => $this->announcement->attachment,
        ];
    }
}
