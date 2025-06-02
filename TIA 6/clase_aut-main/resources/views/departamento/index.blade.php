<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Departamentos</h2>
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Departamentos') }}
        </h2>
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-white text-black px-4 py-2 rounded hover:bg-gray-300 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('departamento.create') }}"
           class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Departamento</a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-blue-300 shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Facultad</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departamentos as $departamento)
                    <tr>
                        <td class="border px-4 py-2">{{ $departamento->id }}</td>
                        <td class="border px-4 py-2">{{ $departamento->nombre }}</td>
                        <td class="border px-4 py-2">{{ $departamento->facultad->nombre ?? 'N/A' }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('departamento.edit', $departamento->id) }}" class="text-indigo-600">Editar</a>
                            <form action="{{ route('departamento.destroy', $departamento->id) }}"
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600"
                                        onclick="return confirm('¿Estás seguro de eliminar este departamento?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No hay departamentos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {!! $departamentos->links() !!}
        </div>
    </div>
</x-app-layout>
