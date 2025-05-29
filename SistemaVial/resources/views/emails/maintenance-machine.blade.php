<x-mail::message>
# La máquina necesita mantenimiento

<x-mail::panel>
Es necesario realizarle mantenimiento a la máquina {{$machine->brand_model . ' ' . $machine->type_machines->name}}
</x-mail::panel>

<x-mail::button :url="route('maintenance.create', $machine->id)" color="primary">
    Click aqui para registrarle un mantenimiento nuevo
</x-mail::button>

</x-mail::message>