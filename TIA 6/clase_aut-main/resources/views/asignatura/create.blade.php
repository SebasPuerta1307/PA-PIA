<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Asignatura</h2>
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Asignaturas') }}
        </h2>
        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('asignatura.store') }}" method="POST" 
              class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" class="w-full border p-2 rounded" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Programa</label>
                <select name="programa_id" class="w-full border p-2 rounded" required>
                    <option value="">Seleccione un programa</option>
                    @foreach ($programas as $programa)
                        <option value="{{ $programa->id }}">{{ $programa->nombre }}</option>
                    @endforeach
                </select>
                @error('programa_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('asignatura.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
