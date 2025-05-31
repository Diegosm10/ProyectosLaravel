<div x-data="{ open: false }" class="relative inline-block">
    <button @click="open = true"
        class="items-center px-3 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600 transition">
        Editar
    </button>

    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 dark:bg-opacity-70" @click="open = false"></div>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md z-50">
            <div class="flex justify-between items-center border-b pb-3">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Editar máquina</h2>
                <button @click="open = false" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">✖</button>
            </div>


            <form method="POST" action="{{ route('machines.update', $machine) }}" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Marca y modelo</label>
                    <input type="text" name="brand_model" value="{{ $machine->brand_model }}"
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kilómetros</label>
                    <input type="number" name="kilometers" value="{{ $machine->kilometers }}"
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tipo de máquina</label>
                    <select name="type_machine_id"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                        <option disabled>Seleccionar...</option>
                        @foreach ($typeMachines as $typeMachine)
                            <option value="{{ $typeMachine->id }}"
                                @if ($typeMachine->id == optional($machine->type_machines)->id) selected @endif>
                                {{ $typeMachine->name }}
                            </option>
                        @endforeach
                    </select>
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
