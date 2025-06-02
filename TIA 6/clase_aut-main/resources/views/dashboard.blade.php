<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-blue-800 dark:text-blue-400 leading-tight">
            {{ __('Menu Principal') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-red-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-gray-100 text-center">
                    Hola, {{ Auth::user()->name }} 👋
                </div>
            </div>
        </div>
    </div> 

    <!-- Agregado para un Menú -->
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-center">Menú de opciones</h3>
                <ul class="list-disc ml-5 space-y-2">
                
                     <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <a href="{{ route('tipos_proyecto.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Tipos de Proyecto
                    </a>
                    <!-- INSTITUCIONES-->
                    <a href="{{ route('institucion.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Instituciones
                    </a>
                    <!-- Facultades -->
                    <a href="{{ route('facultad.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Facultades
                    </a>
                    <!-- Departamentos -->
                    <a href="{{ route('departamento.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Departamentos
                    </a>
                    <!-- Programas -->
                    <a href="{{ route('programa.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Programas
                    </a>
                    <!-- Asignaturas -->
                    <a href="{{ route('asignatura.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Asignaturas
                    </a>
                    <!-- Docentes -->
                    <a href="{{ route('docentes.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Docentes
                    </a>
                    <!-- Estudiantes -->
                    <a href="{{ route('estudiantes.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Estudiantes
                    </a>
                    <!-- Evaluadores -->
                    <a href="{{ route('evaluador.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Evaluadores
                    </a>

                    <!-- Proyectos -->
                    <a href="{{ route('proyectos.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Proyectos
                    </a>

                    <!-- Evaluaciones -->
                    <a href="{{ route('evaluaciones.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Evaluaciones
                    </a>

                    <!-- Proyectos-Asignaturas -->
                    <a href="{{ route('proyecto-asignaturas.index') }}"
                       class="block p-4 rounded-lg border border-gray-300 dark:border-gray-600
                              text-center text-lg font-medium
                              text-blue-600 dark:text-blue-300
                              hover:bg-blue-100 dark:hover:bg-blue-900
                              transition duration-200 ease-in-out
                              bg-white dark:bg-gray-800">
                        Proyectos-Asignaturas
                    </a>

                    
                </ul>
                
            </div>
        </div>
    </div>


</x-app-layout>
