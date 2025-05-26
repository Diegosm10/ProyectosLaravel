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


            <form method="POST" action="{{ route('constructions.update', $construction) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre de la obra</label>
                    <input id="name" name="name" type="text" value="{{ $construction->name }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-indigo-200 focus:border-indigo-300">
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de inicio</label>
                    <input id="start_date" name="start_date" type="date" value="{{ $construction->start_date }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-indigo-200 focus:border-indigo-300">
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de finalización</label>
                    <input id="end_date" name="end_date" type="date" value="{{ $construction->end_date }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-indigo-200 focus:border-indigo-300">
                </div>

                <div>
                    <label for="province_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Provincia</label>
                    <select id="province_id" name="province_id"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-indigo-200 focus:border-indigo-300">
                        <option disabled selected>Seleccionar...</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}"
                                @selected($province->id == optional($construction->provinces)->id)>
                                {{ $province->name }}
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
