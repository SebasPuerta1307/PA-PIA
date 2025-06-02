<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\TiposProyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index() {
        $proyectos = Proyecto::with('tipo')->get();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create() {
        $tipos = TiposProyecto::all();
        return view('proyectos.create', compact('tipos'));
    }

    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo_proyecto_id' => 'required|exists:tipos_proyecto,id',
        ]);

        Proyecto::create($request->all());
        return redirect()->route('proyectos.index');
    }

    public function edit(Proyecto $proyecto) {
        $tipos = TiposProyecto::all();
        return view('proyectos.edit', compact('proyecto', 'tipos'));
    }

    public function update(Request $request, Proyecto $proyecto) {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo_proyecto_id' => 'required|exists:tipos_proyecto,id',
        ]);

        $proyecto->update($request->all());
        return redirect()->route('proyectos.index');
    }

    public function destroy(Proyecto $proyecto) {
        $proyecto->delete();
        return redirect()->route('proyectos.index');
    }
}
