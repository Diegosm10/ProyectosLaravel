<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Listado de máquinas') }}
        </h2>
     <a href="{{ route('machines.create') }}">
            <x-primary-button>{{ __('Registrar máquina') }}</x-primary-button>
    </a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca y modelo</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kilómetros</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de máquina</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($machines as $machine)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $machine->brand_model }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $machine->kilometers }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $machine->type_machines->name ?? 'Sin máquina' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">
                                    <div class="flex space-x-4">
                                        @include('machines.partials.update-machine-form')
                                        @include('machines.partials.delete-machine-form')
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