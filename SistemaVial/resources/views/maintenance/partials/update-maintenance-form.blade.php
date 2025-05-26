<div x-data="{ open: false }" class="relative inline-block">
    <button @click="open = true"
        class="items-center px-3 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600 transition">
        Editar
    </button>

    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 dark:bg-opacity-70" @click="open = false"></div>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md z-50">
            <div class="flex justify-between items-center border-b pb-3">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Editar mantenimiento</h2>
                <button @click="open = false" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">✖</button>
            </div>


            <form method="POST" action="{{ route('maintenance.update', $maintenance) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fecha de registro</label>
                        <input type="date" name="date" id="date" value="{{ old('date',$maintenance->date) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fecha de finalización</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date',$maintenance->end_date) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
                        <input type="text" name="description" id="description" value="{{ old('description', $maintenance->description) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>

                    <div class="mt-4">
                        <label for="kilometers_maintenance" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kilómetros actuales</label>
                        <input type="number" id="kilometers_maintenance" value="{{ $maintenance->kilometers_maintenance }}" name="kilometers_maintenance"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-200"
                        disabled />
                    </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Máquina</label>
                    <select disabled
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                        <option disabled>Seleccionar...</option>
                        @foreach ($machines as $machineItem)
                            <option value="{{ $machineItem->id }}"
                                @if ($machineItem->id == $maintenance->machine_id) selected @endif>
                                {{ $machineItem->brand_model . ' ' . $machineItem->type_machines->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="machine_id" value="{{ $maintenance->machine_id }}">
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-green-500 dark:bg-green-700 text-white rounded-md hover:bg-green-600 dark:hover:bg-green-800">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
