<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Mantenimientos de la máquina') }}
            </h2>
            <a href="{{ route('machines.show', ['machine' => $machine->id]) }}">
                <x-primary-button>{{ __('Volver a información') }}</x-primary-button>
            </a>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if (session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 dark:bg-green-900 dark:text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
    <form method="GET" action="{{ route('maintenance.show', ['machine' => $machine->id]) }}" class="mb-6 flex gap-4 items-end flex-wrap">
    <div>
        <label class="block text-sm text-gray-700 dark:text-gray-300">Desde</label>
        <input type="date" name="start" value="{{ request('start', $start) }}"
            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
    </div>
    <div>
        <label class="block text-sm text-gray-700 dark:text-gray-300">Hasta</label>
        <input type="date" name="end" value="{{ request('end', $end) }}"
            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
    </div>
    <x-primary-button class="h-10">{{ __('Filtrar') }}</x-primary-button>
    </form>
    
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 mt-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Historial de mantenimientos</h3>

                @if($maintenances->isEmpty())
                    <p class="text-sm text-gray-700 dark:text-gray-300 mt-2">No hay registros de mantenimiento.</p>
                @else
                    <ul class="mt-4 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($maintenances as $maintenance)
                            <li class="py-3">
                                <p class="text-sm text-gray-800 dark:text-gray-200"><strong>Fecha inicio:</strong> {{ $maintenance->date }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Fecha fin:</strong> {{ $maintenance->end_date ?? 'En curso' }}</p>
                                <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Kilómetros al mantenimiento:</strong> {{ $maintenance->kilometers_maintenance }}</p>
                                <p class="text-sm italic text-gray-500 dark:text-gray-400">{{ $maintenance->description }}</p>
                                <div class="flex space-x-4">
                                    @include('maintenance.partials.update-maintenance-form', ['maintenance' => $maintenance, 'machines' => $machines])
                                    @include('maintenance.partials.delete-maintenance-form', ['maintenance' => $maintenance])
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
