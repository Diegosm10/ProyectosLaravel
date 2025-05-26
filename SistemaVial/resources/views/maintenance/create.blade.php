<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Registrar mantenimiento') }}
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

                <form method="POST" action="{{ route('maintenance.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fecha de registro</label>
                        <input type="date" name="date" id="date" value="{{ old('date') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fecha de finalización</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
                        <input type="text" name="description" id="description" value="{{ old('description') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>

                    <div class="mt-4">
                        <label for="kilometers" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kilómetros actuales</label>
                        <input type="text" id="kilometers" readonly
                        class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 dark:text-white border-gray-300 dark:border-gray-600 shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>

                    <div>
                        <label for="inputMachine" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Máquina:</label>
                        <select id="inputMachine" name="machine_id" onchange="showKilometers()"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                            <option selected>Seleccionar...</option>
                            @foreach ($machines as $machine)
                                <option value="{{$machine->id}}" data-kilometers="{{ $machine->kilometers }}">{{$machine->brand_model . ' ' . $machine->type_machines->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-primary-button>
                            {{ __('Registrar mantenimiento') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
