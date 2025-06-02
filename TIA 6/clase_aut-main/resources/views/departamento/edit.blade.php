<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Departamentos') }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Departamento</h2>
        <a href="{{ route('departamento.index') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver
        </a>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('departamento.update', $departamento->id) }}" method="POST"
              class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Nombre del Departamento</label>
                <input type="text" name="nombre" value="{{ old('nombre', $departamento->nombre) }}"
                       class="w-full border p-2 rounded" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Facultad</label>
                <select name="facultad_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona una Facultad</option>
                    @foreach ($facultades as $facultad)
                        <option value="{{ $facultad->id }}" 
                            {{ $departamento->facultad_id == $facultad->id ? 'selected' : '' }}>
                            {{ $facultad->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('facultad_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('departamento.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
