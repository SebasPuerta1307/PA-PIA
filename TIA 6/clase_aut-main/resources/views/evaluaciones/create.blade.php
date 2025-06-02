<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Evaluación</h2>
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Evaluaciones') }}
        </h2>
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('evaluaciones.store') }}" method="POST" class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Proyecto</label>
                <select name="proyecto_id" class="w-full border p-2 rounded" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->titulo }}</option>
                    @endforeach
                </select>
                @error('proyecto_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Evaluador</label>
                <select name="evaluador_id" class="w-full border p-2 rounded" required>
                    @foreach ($evaluadores as $evaluador)
                        <option value="{{ $evaluador->id }}">{{ $evaluador->nombre }}</option>
                    @endforeach
                </select>
                @error('evaluador_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Fecha</label>
                <input type="date" name="fecha" class="w-full border p-2 rounded" required>
                @error('fecha')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Criterio 1</label>
                <input type="number" name="criterio1" class="w-full border p-2 rounded" min="0.0" max="5.0">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Criterio 2</label>
                <input type="number" name="criterio2" class="w-full border p-2 rounded" min="0.0" max="5.0">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Criterio 3</label>
                <input type="number" name="criterio3" class="w-full border p-2 rounded" min="0.0" max="5.0">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Observaciones</label>
                <textarea name="observaciones" class="w-full border p-2 rounded"></textarea>
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('evaluaciones.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
