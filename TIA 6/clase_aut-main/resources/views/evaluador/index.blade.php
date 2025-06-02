<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Evaluador</h2>
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Evaluador') }}
        </h2>
        <a href="{{ route('dashboard') }}"
            class="inline-block bg-white text-black px-4 py-2 rounded hover:bg-gray-300 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('evaluador.create') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Evaluador</a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-blue-300 shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Correo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluadores as $evaluador)
                    <tr>
                        <td class="border px-4 py-2">{{ $evaluador->nombre }}</td>
                        <td class="border px-4 py-2">{{ $evaluador->correo }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('evaluador.edit', $evaluador) }}" class="text-blue-600">Editar</a>
                            <form action="{{ route('evaluador.destroy', $evaluador) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('¿Eliminar esta facultad?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($evaluadores->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No hay Facultades registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
