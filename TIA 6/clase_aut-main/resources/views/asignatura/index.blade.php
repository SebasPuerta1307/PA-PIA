<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Asignaturas</h2>
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Asignaturas') }}
        </h2>
        <a href="{{ route('dashboard') }}"
            class="inline-block bg-white text-black px-4 py-2 rounded hover:bg-gray-300 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('asignatura.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Nueva Asignatura</a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-blue-200 shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Programa</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaturas as $asignatura)
                    <tr>
                        <td class="border px-4 py-2">{{ $asignatura->id }}</td>
                        <td class="border px-4 py-2">{{ $asignatura->nombre }}</td>
                        <td class="border px-4 py-2">{{ $asignatura->programa->nombre ?? 'Sin programa' }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('asignatura.edit', $asignatura) }}" class="text-blue-600">Editar</a>
                            <form action="{{ route('asignatura.destroy', $asignatura) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('¿Eliminar esta asignatura?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($asignaturas->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No hay Asignaturas registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-4">
            {!! $asignaturas->links() !!}
        </div>
    </div>
</x-app-layout>
