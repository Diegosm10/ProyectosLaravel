 <form action="{{ route('constructionMachines.destroy', $constructionMachine->id) }}" method="POST"
              onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta obra?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="items-center px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition">
                Eliminar
            </button>
        </form>