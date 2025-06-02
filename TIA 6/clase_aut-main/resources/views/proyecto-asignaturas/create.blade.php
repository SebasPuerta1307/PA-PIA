<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Asignación</h2>
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Proyecto Asignaturas') }}
        </h2>
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
           ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('proyecto-asignaturas.store') }}" method="POST" class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Proyecto</label>
                <select name="proyecto_id" class="w-full border p-2 rounded" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->titulo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Asignatura</label>
                <select name="asignatura_id" class="w-full border p-2 rounded" required>
                    @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Grupo</label>
                <input type="text" name="grupo" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Docente</label>
                <select name="docente_id" class="w-full border p-2 rounded" required>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('proyecto-asignaturas.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
