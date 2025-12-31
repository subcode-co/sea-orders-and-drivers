<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Request;
use App\Models\User;
use App\Notifications\ArrivalReminderNotification;

class SendArrivalReminders extends Command
{
    protected $signature = 'requests:arrival-reminders';
    protected $description = 'Send notifications before tourist arrival';

    public function handle()
    {
        $targetStart = now()->addHours(1);
        $targetEnd   = now()->addHours(30);

        $requests = Request::where('arrival_notified', false)
            ->whereBetween('arrival_time', [$targetStart, $targetEnd])
            ->get();

        if ($requests->isEmpty()) {
            $this->info('No arrival reminders to send.');
            return;
        }

        $users = User::all(); // you only have users

        foreach ($requests as $request) {
            foreach ($users as $user) {
                $user->notify(new ArrivalReminderNotification($request));
            }

            // mark as notified AFTER sending
            $request->update(['arrival_notified' => true]);
        }

        $this->info('Arrival reminders sent.');

    }
}
