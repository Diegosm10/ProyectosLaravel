<?php

namespace App\Listeners;

use App\Events\AlertMaintenanceMachineEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        
    }
}
