<?php

namespace App\Listeners;

use App\Events\AlertMaintenanceMachineEvent;
use App\Mail\MaintenanceMachineMail;
use Illuminate\Support\Facades\Auth;
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

        $machine = $event->machine;

        $maintenance = $machine->maintenances()->orderByDesc('date')->first();
        if (!$maintenance && $machine->kilometers >= 50000) {
            Mail::to(Auth::user()->email)->send(new MaintenanceMachineMail($machine));
        }
        elseif ($maintenance->kilometers_maintenance + 50000 <= $machine->kilometers){
            Mail::to(Auth::user()->email)->send(new MaintenanceMachineMail($machine));
        };   
    }
}
