{{-- resources/views/constructionMachines/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white leading-tight">
            {{ __('Listado de obras activas') }}
        </h2>
        <a href="{{ route('constructionMachines.create') }}">
            <x-primary-button>{{ __('Registrar Obra') }}</x-primary-button>
        </a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 dark:bg-green-900 dark:text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

           <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de inicio</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de finalización</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Razón de finalización</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kilómetros recorridos</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Máquina</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Construcción</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($constructionMachines as $constructionMachine)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $constructionMachine->start_date }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $constructionMachine->end_date ?? 'Sin finalizar' }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $constructionMachine->reason_for_the_end ?? 'Sin finalizar' }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $constructionMachine->km_traveled ?? 'Sin finalizar' }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $constructionMachine->machine->brand_model }} {{ $constructionMachine->machine->type_machines->name }}
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $constructionMachine->construction->name }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                            <div class="flex justify-end space-x-2">
                                                @include('constructionMachines.partials.update-constructionMachines-form')
                                                @include('constructionMachines.partials.delete-constructionMachines-form')
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>