<?php

namespace App\Listeners;

use App\Events\KeteranganBelajar;
use App\Models\User;
use App\Notifications\KeteranganBelajarNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ListenKeteranganBelajar
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  KeteranganBelajar  $event
     * @return void
     */
    public function handle(KeteranganBelajar $event)
    {
        //
        $admins = User::whereHas('roles', function ($query){
            $query->where('id', 1);
        })->get();

        Notification::send($admins, new KeteranganBelajarNotification($event->event) );
    }
}
