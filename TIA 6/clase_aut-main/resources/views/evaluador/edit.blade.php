<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Evaluadores') }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Evaluador</h2>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-center">
        <form action="{{ route('evaluador.update', $evaluador) }}" method="POST" class="bg-white p-6 rounded shadow-md w-[600px]">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $evaluador->nombre) }}" class="w-full border p-2 rounded" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Correo</label>
                <input type="text" name="correo" value="{{ old('correo', $evaluador->correo) }}" class="w-full border p-2 rounded" required>
                @error('correo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('evaluador.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>

