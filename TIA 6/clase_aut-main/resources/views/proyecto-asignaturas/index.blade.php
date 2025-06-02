<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Proyecto Asignaturas</h2>
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Proyecto Asignaturas') }}
        </h2>
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-white text-black px-4 py-2 rounded hover:bg-gray-300 mb-4">
           ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('proyecto-asignaturas.create') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Nueva Asignación</a>

        <table class="min-w-full bg-blue-300 shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Proyecto</th>
                    <th class="px-4 py-2 border">Asignatura</th>
                    <th class="px-4 py-2 border">Grupo</th>
                    <th class="px-4 py-2 border">Docente</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaciones as $asignacion)
                    <tr>
                        <td class="border px-4 py-2">{{ $asignacion->proyecto->titulo }}</td>
                        <td class="border px-4 py-2">{{ $asignacion->asignatura->nombre }}</td>
                        <td class="border px-4 py-2">{{ $asignacion->grupo }}</td>
                        <td class="border px-4 py-2">{{ $asignacion->docente->nombre }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('proyecto-asignaturas.edit', $asignacion) }}" class="text-blue-600">Editar</a>
                            <form action="{{ route('proyecto-asignaturas.destroy', $asignacion) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('¿Eliminar esta asignación?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($asignaciones->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No hay asignaciones registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
