<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Listado de máquinas') }}
        </h2>
        <a href="{{ route('machines.create') }}">
            <x-primary-button>{{ __('Registrar Máquina') }}</x-primary-button>
        </a>
        <a href="{{ route('maintenance.create') }}">
            <x-primary-button>{{ __('Registrar Mantenimiento') }}</x-primary-button>
        </a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 dark:bg-green-900 dark:text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Marca y modelo</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Kilómetros</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Tipo de máquina</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($machines as $machine)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $machine->brand_model }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $machine->kilometers }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $machine->type_machines->name ?? 'Sin máquina' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    <div class="flex space-x-4">
                                        @include('machines.partials.update-machine-form')
                                        @include('machines.partials.delete-machine-form')
                                        <a href="{{ route('machines.show', ['machine' => $machine->id]) }}" class="items-center px-3 py-1 bg-indigo-600 text-white text-xs font-medium rounded hover:bg-indigo-900 transition">Ver info</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
