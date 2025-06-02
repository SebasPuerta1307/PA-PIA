<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Proyecto;
use App\Models\Evaluador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluacionController extends Controller
{
    public function index()
    {
        $evaluaciones = Evaluacion::with(['proyecto', 'evaluador'])->latest()->paginate(10);
        return view('evaluaciones.index', compact('evaluaciones'));
    }

    public function create()
    {
        $proyectos = Proyecto::orderBy('titulo')->get();
        $evaluadores = Evaluador::orderBy('nombre')->get();
        return view('evaluaciones.create', compact('proyectos', 'evaluadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'evaluador_id' => 'required|exists:evaluadores,id',
            'fecha' => 'required|date',
            'criterio1' => 'nullable|integer|min:0|max:100',
            'criterio2' => 'nullable|integer|min:0|max:100',
            'criterio3' => 'nullable|integer|min:0|max:100',
            'observaciones' => 'nullable|string',
        ]);

        Evaluacion::create($request->all());

        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación registrada correctamente.');
    }

    public function edit(Evaluacion $evaluacion)
    {
        $proyectos = Proyecto::orderBy('titulo')->get();
        $evaluadores = Evaluador::orderBy('nombre')->get();
        return view('evaluaciones.edit', compact('evaluacion', 'proyectos', 'evaluadores'));
    }

    public function update(Request $request, Evaluacion $evaluacion)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'evaluador_id' => 'required|exists:evaluadores,id',
            'fecha' => 'required|date',
            'criterio1' => 'nullable|integer|min:0|max:100',
            'criterio2' => 'nullable|integer|min:0|max:100',
            'criterio3' => 'nullable|integer|min:0|max:100',
            'observaciones' => 'nullable|string',
        ]);

        $evaluacion->update($request->all());

        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación actualizada correctamente.');
    }

   public function destroy($id)
    {
        try {
        $evaluacion = Evaluacion::findOrFail($id);
        $evaluacion->delete();
        return redirect()->route('evaluaciones.index')
            ->with('success', 'Registro eliminado correctamente.');
    } catch (\Exception $e) {
        return redirect()->route('evaluaciones.index')
            ->with('error', 'No se eliminó el registro ID: ' . $id);
    }
    }

    
}
