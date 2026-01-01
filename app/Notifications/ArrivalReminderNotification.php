<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification as LaravelNotification;
use Filament\Notifications\Notification as FilamentNotification;
use App\Models\User;

class ArrivalReminderNotification extends LaravelNotification
{
    use Queueable;

    public function __construct(public $request) {}

    public function via($notifiable): array
    {
        return ['database'];
    }


    public function toDatabase(User $notifiable): array
    {
        app()->setLocale(config('app.locale'));
        return FilamentNotification::make()
            ->title(__('admin.arrival_reminder'))
            ->body(__('admin.tourist_arrival_in_24_hours', [
                'airport_name' => $this->request->airport_name,
                'name' => $this->request->tourist_name,
                'time' => $this->request->arrival_time->format('Y-m-d H:i'),
            ]))
            ->icon('heroicon-o-bell')
            ->color('warning')
            ->getDatabaseMessage();
    }

}
