<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Información de la máquina') }}
            </h2>
            <a href="{{ route('maintenance.show', ['machine' => $machine->id]) }}">
                <x-primary-button>{{ __('Ver mantenimientos de la máquina') }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Datos generales</h3>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">Marca y modelo: <strong>{{ $machine->brand_model }}</strong></p>
                <p class="text-sm text-gray-700 dark:text-gray-300">Kilómetros: <strong>{{ $machine->kilometers }}</strong></p>
                <p class="text-sm text-gray-700 dark:text-gray-300">Tipo: <strong>{{ $machine->type_machines->name ?? 'Sin tipo definido' }}</strong></p>
            </div>

            
            @if($currentConstruction)
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Obra actual</h3>
                <p class="text-sm text-gray-700 dark:text-gray-300">Nombre: <strong>{{ $currentConstruction->construction->name }}</strong></p>
                <p class="text-sm text-gray-700 dark:text-gray-300">Provincia: <strong>{{ $currentConstruction->construction->provinces->name }}</strong></p>
                <p class="text-sm text-gray-700 dark:text-gray-300">Inicio: <strong>{{ $currentConstruction->start_date }}</strong></p>
            </div>
            @else
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Obra actual</h3>
                <p class="text-sm text-gray-700 dark:text-gray-300 italic">Esta máquina no está asignada actualmente a ninguna obra.</p>
            </div>
            @endif

           
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <form method="GET" action="{{ route('machines.show', $machine->id) }}" class="flex gap-4 items-end flex-wrap">
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300">Desde</label>
                        <input type="date" name="start" value="{{ request('start') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300">Hasta</label>
                        <input type="date" name="end" value="{{ request('end') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>
                    <x-primary-button class="h-10">{{ __('Filtrar historial') }}</x-primary-button>
                </form>
            </div>

            
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Historial de obras</h3>

                @if($history->isEmpty())
                    <p class="text-sm text-gray-700 dark:text-gray-300 mt-2">No se encontraron registros.</p>
                @else
                    <ul class="mt-4 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($history as $record)
                            <li class="py-3">
                                <p class="text-sm text-gray-800 dark:text-gray-200"><strong>{{ $record->construction->name }}</strong> - {{ $record->construction->provinces->name }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $record->start_date }} — {{ $record->end_date ?? 'Actual' }} ({{ $record->kilometers_traveled }} km)
                                </p>
                                <p class="text-sm italic text-gray-500 dark:text-gray-400">{{ $record->reason_for_the_end ?? '—' }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
