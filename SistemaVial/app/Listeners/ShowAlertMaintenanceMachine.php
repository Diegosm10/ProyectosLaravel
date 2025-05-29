<?php

namespace App\Listeners;

use App\Events\AlertMaintenanceMachineEvent;
use App\Mail\MaintenanceMachineMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ShowAlertMaintenanceMachine
{


    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(AlertMaintenanceMachineEvent $event): void
    {
        Mail::to('prueba@prueba.com ')
            ->send(new MaintenanceMachineMail);
    }
}
