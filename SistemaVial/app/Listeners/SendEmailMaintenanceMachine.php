<?php

namespace App\Listeners;

use App\Events\EmailMaintenanceMachineEvent;
use App\Mail\MaintenanceMachineMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailMaintenanceMachine
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
    public function handle(EmailMaintenanceMachineEvent $event): void
    {

        $machine = $event->machine;
        $maintenance = $machine->maintenances()->orderByDesc('date')->first();
        if (!$maintenance && $machine->kilometers >= $machine->type_machines->kilometers_maintenance){
            Mail::to(Auth::user()->email)->send(new MaintenanceMachineMail($machine));
        }
        elseif ($maintenance->kilometers_maintenance + $machine->type_machines->kilometers_maintenance <= $machine->kilometers){
            Mail::to(Auth::user()->email)->send(new MaintenanceMachineMail($machine));
        } 
    }
}
