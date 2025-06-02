<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Proyecto</h2>
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Proyectos') }}
        </h2>
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('proyectos.store') }}" method="POST" class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Título</label>
                <input type="text" name="titulo" class="w-full border p-2 rounded" required>
                @error('titulo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Descripción</label>
                <textarea name="descripcion" class="w-full border p-2 rounded"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Tipo de Proyecto</label>
                <select name="tipo_proyecto_id" class="w-full border p-2 rounded" required>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('proyectos.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
