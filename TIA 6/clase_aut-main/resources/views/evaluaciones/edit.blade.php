<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Evaluaciones') }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Evaluación</h2>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('evaluaciones.update', $evaluacion) }}" method="POST" class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf
            @method('PUT')

            {{-- Proyecto --}}
            <div class="mb-4">
                <label class="block font-bold">Proyecto</label>
                <select name="proyecto_id" class="w-full border p-2 rounded" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ $evaluacion->proyecto_id == $proyecto->id ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Evaluador --}}
            <div class="mb-4">
                <label class="block font-bold">Evaluador</label>
                <select name="evaluador_id" class="w-full border p-2 rounded" required>
                    @foreach ($evaluadores as $evaluador)
                        <option value="{{ $evaluador->id }}" {{ $evaluacion->evaluador_id == $evaluador->id ? 'selected' : '' }}>
                            {{ $evaluador->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Fecha --}}
            <div class="mb-4">
                <label class="block font-bold">Fecha</label>
                <input type="date" name="fecha" value="{{ $evaluacion->fecha->format('Y-m-d') }}" class="w-full border p-2 rounded" required>
            </div>

            {{-- Criterio 1 --}}
            <div class="mb-4">
                <label class="block font-bold">Criterio 1</label>
                <input type="text" name="criterio1" value="{{ $evaluacion->criterio1 }}" class="w-full border p-2 rounded">
            </div>

            {{-- Criterio 2 --}}
            <div class="mb-4">
                <label class="block font-bold">Criterio 2</label>
                <input type="text" name="criterio2" value="{{ $evaluacion->criterio2 }}" class="w-full border p-2 rounded">
            </div>

            {{-- Criterio 3 --}}
            <div class="mb-4">
                <label class="block font-bold">Criterio 3</label>
                <input type="text" name="criterio3" value="{{ $evaluacion->criterio3 }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Observaciones</label>
                <input type="text" name="observaciones" value="{{ $evaluacion->observaciones }}" class="w-full border p-2 rounded">
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('evaluaciones.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
