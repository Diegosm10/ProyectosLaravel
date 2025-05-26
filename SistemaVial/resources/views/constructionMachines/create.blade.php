<x-app-layout>
     <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
            {{ __('Crear nueva obra activa') }}
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

        <form method="POST" action="{{ route('constructionMachines.store')}}" class="space-y-4">
            @csrf
            @method("POST")

            <div>
                <label for="inputStartDate" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fecha de inicio:</label>
                <input type="date" id="inputStartDate" name="start_date" value="{{ old('start_date') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label for="inputConstruction" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Construcción:</label>
                <select id="inputConstruction" name="construction_id"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                    <option selected>Seleccionar...</option>
                    @foreach ($constructions as $construction)
                        <option value="{{$construction->id}}">{{$construction->name}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="inputMachine" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Máquina:</label>
                <select id="inputMachine" name="machine_id"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                    <option selected>Seleccionar...</option>
                    @foreach ($machines as $machine)
                        <option value="{{$machine->id}}">{{$machine->brand_model . ' ' . $machine->type_machines->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 dark:bg-blue-700 text-white rounded-md hover:bg-blue-600 dark:hover:bg-blue-800 shadow-md">
                    Crear
                </button>
            </div>
        </form>

        @if (session('success'))
            <div class="mt-4 p-4 bg-green-500 text-white rounded-md">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-app-layout>