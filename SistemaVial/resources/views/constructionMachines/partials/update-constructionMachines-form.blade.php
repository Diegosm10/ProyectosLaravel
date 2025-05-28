<div x-data="{ open: false }" class="relative inline-block">
    <button @click="open = true"
        class="items-center px-3 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600 transition">
        Editar
    </button>

    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 dark:bg-opacity-70" @click="open = false"></div>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md z-50">
            <div class="flex justify-between items-center border-b pb-3">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Editar obra</h2>
                <button @click="open = false" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">✖</button>
            </div>

            <form method="POST" action="{{ route('constructionMachines.update', $constructionMachine) }}" class="mt-4">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label for="inputStartDate" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de inicio</label>
                        <input type="date" id="inputStartDate" name="start_date" value="{{ $constructionMachine->start_date }}"
                            class="w-full px-3 py-2 border rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>

                    <div>
                        <label for="inputEndDate" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de finalización</label>
                        <input type="date" id="inputEndDate" name="end_date" value="{{ $constructionMachine->end_date ?? '' }}"
                            class="w-full px-3 py-2 border rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>

                    <div>
                        <label for="inputReason" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Razón de fin</label>
                        <input type="text" id="inputReason" name="reason_for_the_end" value="{{ $constructionMachine->reason_for_the_end ?? '' }}"
                            class="w-full px-3 py-2 border rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>

                    <div>
                        <label for="inputKm" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kilómetros recorridos</label>
                        <input type="text" id="inputKm" name="km_traveled" value="{{ $constructionMachine->km_traveled ?? '' }}"
                            class="w-full px-3 py-2 border rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>

                    <div>
                        <label for="inputConstruction" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Construcción</label>
                        <select id="inputConstruction" name="construction_id"
                            class="w-full px-3 py-2 border rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            @foreach ($constructions as $construction)
                                <option value="{{ $construction->id }}" {{ $construction->id == $constructionMachine->construction->id ? 'selected' : '' }}>
                                    {{ $construction->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="inputMachine" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Máquina</label>
                        <select id="inputMachine" name="machine_id" readonly
                            class="w-full px-3 py-2 border rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            @foreach ($machines as $machine)
                                <option value="{{ $machine->id }}" {{ $constructionMachine->machine->id == $machine->id ? 'selected' : '' }}>
                                    {{ $machine->brand_model . ' ' . $machine->type_machines->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
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
