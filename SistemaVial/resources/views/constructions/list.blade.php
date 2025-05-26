<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white leading-tight">
            {{ __('Listado de obras') }}
        </h2>
        <a href="{{ route('constructions.create') }}">
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
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre de la obra</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de inicio</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de fin</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Provincia</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($constructions as $construction)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $construction->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $construction->start_date }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $construction->end_date }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $construction->provinces->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    <div class="flex space-x-4">
                                        @include('constructions.partials.update-construction-form')
                                        @include('constructions.partials.delete-construction-form')
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
