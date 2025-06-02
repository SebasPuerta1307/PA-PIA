<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Asignatura') }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Asignatura</h2>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('asignatura.update', $asignatura) }}" method="POST" class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $asignatura->nombre) }}" class="w-full border p-2 rounded" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Programa</label>
                <select name="programa_id" class="w-full border p-2 rounded" required>
                     @foreach ($programas as $programa)
                        <option value="{{ $programa->id }}">
                            {{ old('programa_id', $asignatura->programa_id) == $programa->id ? 'selected' : '' }}
                            {{ $programa->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('programa_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('asignatura.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
