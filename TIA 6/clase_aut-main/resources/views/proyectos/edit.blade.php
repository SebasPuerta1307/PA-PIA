<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Proyectos') }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Proyecto</h2>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('proyectos.update', $proyecto) }}" method="POST" class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Título</label>
                <input type="text" name="titulo" value="{{ $proyecto->titulo }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Descripción</label>
                <textarea name="descripcion" class="w-full border p-2 rounded">{{ $proyecto->descripcion }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Tipo de Proyecto</label>
                <select name="tipo_proyecto_id" class="w-full border p-2 rounded" required>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ $proyecto->tipo_proyecto_id == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('proyectos.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
