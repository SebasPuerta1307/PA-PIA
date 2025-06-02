<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Evaluaciones</h2>
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Evaluaciones') }}
        </h2>
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-white text-black px-4 py-2 rounded hover:bg-gray-300 mb-4">
           ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
         @if (session('success'))
        <div class="mb-4 p-4 text-green-800 bg-green-200 rounded">
            {{ session('success') }}
        </div>
        @endif

        {{-- Mensajes flash de error --}}
        @if (session('error'))
            <div class="mb-4 p-4 text-red-800 bg-red-200 rounded">
                {{ session('error') }}
            </div>
        @endif
        <a href="{{ route('evaluaciones.create') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Nueva Evaluación</a>

        <table class="min-w-full bg-blue-300 shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Proyecto</th>
                    <th class="px-4 py-2 border">Evaluador</th>
                    <th class="px-4 py-2 border">Fecha</th>
                    <th class="px-4 py-2 border">Criterio 1</th>
                    <th class="px-4 py-2 border">Criterio 2</th>
                    <th class="px-4 py-2 border">Criterio 3</th>
                    <th class="px-4 py-2 border">Observaciones</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluaciones as $evaluacion)
                    <tr>
                        <td class="border px-4 py-2">{{ $evaluacion->proyecto->titulo ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $evaluacion->evaluador->nombre ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $evaluacion->fecha }}</td>
                        <td class="border px-4 py-2">{{ $evaluacion->criterio1 ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $evaluacion->criterio2 ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $evaluacion->criterio3 ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $evaluacion->observaciones ?? 'N/A' }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('evaluaciones.edit', $evaluacion) }}" class="text-blue-600">Editar</a>
                            <form action="{{ route('evaluaciones.destroy', $evaluacion) }}" method="POST" class="inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('¿Eliminar esta evaluación?')">Eliminar</button>
                                
                            </form>
                        </td>
                    </tr> 
                @endforeach
                @if ($evaluaciones->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No hay evaluaciones registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-4">
            {{ $evaluaciones->links() }}
        </div>
    </div>
</x-app-layout>
