<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ArrivalReminderNotification extends Notification
{
    use Queueable;

    public function __construct(public $request) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toDatabase($notifiable)
    {
        return [
            'title' => __('admin.arrival_reminder'),
            'body' => __('admin.tourist_arrival_in_24_hours', [
                'name' => $this->request->tourist_name,
                'time' => $this->request->arrival_time->format('Y-m-d H:i'),
            ]),
            'icon' => 'heroicon-o-bell',
            'color' => 'warning',
        ];
    }

}
