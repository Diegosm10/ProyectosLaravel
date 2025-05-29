<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Editar parametros') }}
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

                <form method="POST" action="{{ route('parametersMaintenance.update', $parameter) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <label for="kilometers_maintenance" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kilómetros cada cuanto se realiza el mantenimiento</label>
                        <input type="number" id="kilometers_maintenance" name="kilometers_maintenance" value="{{$parameter->kilometers_maintenance}}"
                        class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 dark:text-white border-gray-300 dark:border-gray-600 shadow-sm focus:ring focus:ring-indigo-200" />
                    </div>
                    <div>
                        <div class="mt-4 flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-green-500 dark:bg-green-700 text-white rounded-md hover:bg-green-600 dark:hover:bg-green-800">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>