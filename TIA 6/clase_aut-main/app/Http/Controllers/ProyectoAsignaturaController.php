<?php

namespace App\Http\Controllers;

use App\Models\ProyectoAsignatura;
use App\Models\Proyecto;
use App\Models\Asignatura;
use App\Models\Docente;
use Illuminate\Http\Request;

class ProyectoAsignaturaController extends Controller
{
    public function index() {
        $asignaciones = ProyectoAsignatura::with(['proyecto', 'asignatura', 'docente'])->get();
        return view('proyecto-asignaturas.index', compact('asignaciones'));
    }

    public function create() {
        $proyectos = Proyecto::all();
        $asignaturas = Asignatura::all();
        $docentes = Docente::all();
        return view('proyecto-asignaturas.create', compact('proyectos', 'asignaturas', 'docentes'));
    }

    public function store(Request $request) {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'grupo' => 'required|string|max:50',
            'docente_id' => 'required|exists:docentes,id',
        ]);

        ProyectoAsignatura::create($request->all());
        return redirect()->route('proyecto-asignaturas.index');
    }

    public function edit(ProyectoAsignatura $proyecto_asignatura) {
        $proyectos = Proyecto::all();
        $asignaturas = Asignatura::all();
        $docentes = Docente::all();
        return view('proyecto-asignaturas.edit', [
            'proyecto_asignatura' => $proyecto_asignatura,
            'proyectos' => $proyectos,
            'asignaturas' => $asignaturas,
            'docentes' => $docentes,
        ]);
    }

    public function update(Request $request, ProyectoAsignatura $proyecto_asignatura) {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'grupo' => 'required|string|max:50',
            'docente_id' => 'required|exists:docentes,id',
        ]);

        $proyecto_asignatura->update($request->all());
        return redirect()->route('proyecto-asignaturas.index');
    }

    public function destroy(ProyectoAsignatura $proyecto_asignatura) {
        $proyecto_asignatura->delete();
        return redirect()->route('proyecto-asignaturas.index');
    }
}

