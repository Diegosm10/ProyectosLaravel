<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Crear nueva máquina') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                @if ($errors->any())
                    <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 dark:bg-red-900 dark:text-red-200 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 dark:bg-green-900 dark:text-green-200 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('machines.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="brand_model" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Marca y modelo</label>
                        <input type="text" name="brand_model" id="brand_model" value="{{ old('brand_model') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>

                    <div>
                        <label for="kilometers" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kilómetros</label>
                        <input type="number" name="kilometers" id="kilometers" value="{{ old('kilometers') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>

                    <div>
                        <label for="type_machines" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tipo de máquina</label>
                        <select name="type_machine_id" id="type_machines"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                            <option disabled selected>Seleccionar...</option>
                            @foreach ($typeMachines as $typeMachine)
                                <option value="{{ $typeMachine->id }}">{{ $typeMachine->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-primary-button>
                            {{ __('Registrar máquina') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

