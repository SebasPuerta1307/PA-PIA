<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Proyecto Asignaturas') }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Asignación</h2>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('proyecto-asignaturas.update', $proyecto_asignatura) }}" method="POST" class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Proyecto</label>
                <select name="proyecto_id" class="w-full border p-2 rounded" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ $proyecto->id == $proyecto_asignatura->proyecto_id ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Asignatura</label>
                <select name="asignatura_id" class="w-full border p-2 rounded" required>
                    @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}" {{ $asignatura->id == $proyecto_asignatura->asignatura_id ? 'selected' : '' }}>
                            {{ $asignatura->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Grupo</label>
                <input type="text" name="grupo" value="{{ $proyecto_asignatura->grupo }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Docente</label>
                <select name="docente_id" class="w-full border p-2 rounded" required>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->id }}" {{ $docente->id == $proyecto_asignatura->docente_id ? 'selected' : '' }}>
                            {{ $docente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('proyecto-asignaturas.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
