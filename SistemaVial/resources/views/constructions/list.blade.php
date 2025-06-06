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
            @if (session('error'))
                    <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 dark:bg-red-900 dark:text-red-200 rounded-lg">
                        <ul class="list-disc list-inside">
                            {{ session('error') }}
                        </ul>
                    </div>
            @endif
            @if (session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 dark:bg-green-900 dark:text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <form method="GET" action="{{ route('constructions.index') }}" class="flex gap-4 items-end flex-wrap">
                    <div>
                        <label for="province_id" class="block text-sm text-gray-700 dark:text-gray-300">Provincia</label>
                        <select name="province_id" id="province_id"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                            <option value="">Todas</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ request('province_id') == $province->id ? 'selected' : '' }}>
                                    {{ $province->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <x-primary-button class="h-10">{{ __('Filtrar') }}</x-primary-button>
                </form>
                <form method="GET" action="{{ route('constructions.reportMonthly') }}" class="flex gap-4 items-end flex-wrap mt-4">
                    <div>
                        <label for="month" class="block text-sm text-gray-700 dark:text-gray-300">Mes</label>
                        <input type="month" name="month" id="month"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200"
                            required>
                    </div>
                    <x-primary-button class="h-10">{{ __('Generar PDF') }}</x-primary-button>
                </form>
            </div>

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
