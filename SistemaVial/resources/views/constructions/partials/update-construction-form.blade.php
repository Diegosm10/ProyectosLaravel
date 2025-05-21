<div x-data="{ open: false }" class="flex space-x-2">
        <button 
            @click="open = true"
            class="inline-flex items-center px-3 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600 transition"
        >
            Editar
        </button>

        <div
            x-show="open"
            x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        >
            <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Editar Obra</h2>
                    <button @click="open = false" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
                </div>

                <form method="POST" action="{{ route('constructions.update', $construction) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre de la obra</label>
                        <input type="text" name="brand_model" value="{{ $construction->name }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
                        <input type="date" name="start_date" value="{{ $construction->start_date }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha de finalización</label>
                        <input type="date" name="end_date" value="{{ $construction->end_date }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Provincia</label>
                        <select name="province_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                            <option disabled selected>Seleccionar...</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}"
                                    @if ($province->id == optional($construction->provinces)->id) selected @endif>
                                    {{ $province->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                            Actualizar
                        </button>
                        <button type="button" @click="open = false"
                                class="px-4 py-2 bg-gray-300 text-sm text-gray-700 rounded hover:bg-gray-400">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>