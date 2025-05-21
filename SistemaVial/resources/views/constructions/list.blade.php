<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Listado de construcciones') }}
        </h2>
        <a href="{{ route('constructions.create') }}">
            <x-primary-button>{{ __('Registrar Obra') }}</x-primary-button>
        </a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre de la obra</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de inicio</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de fin</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Provincia</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($constructions as $construction)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $construction->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $construction->start_date }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $construction->end_date }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $construction->provinces->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">
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