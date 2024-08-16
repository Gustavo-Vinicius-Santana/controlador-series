<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SeriesCreated;

class EmailUsersAboutSeriesCreated implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(\App\Events\SeriesCreated $event): void
    {
        $userList = User::all();
        foreach ($userList as $index => $user){
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonQty,
                $event->episodesPerSeason
            );
            $when = now()->addSeconds($index * 10);
            Mail::to($user)->later($when ,$email);
            // sleep(2);
        }
    }
}
