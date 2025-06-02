<?php

namespace App\Http\Controllers;

use App\Models\Evaluador;
use Illuminate\Http\Request;

class EvaluadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $evaluadores = Evaluador::all();
        return view('evaluador.index', compact('evaluadores'));
    }

    public function create() {
        return view('evaluador.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:evaluadores'
        ]);

        Evaluador::create($request->all());
        return redirect()->route('evaluador.index');
    }

    public function edit(Evaluador $evaluador) {
        return view('evaluador.edit', compact('evaluador'));
    }

    public function update(Request $request, Evaluador $evaluador) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:evaluadores,correo,' . $evaluador->id
        ]);

        $evaluador->update($request->all());
        return redirect()->route('evaluador.index');
    }

    public function destroy(Evaluador $evaluador) {
        $evaluador->delete();
        return redirect()->route('evaluador.index');
    }
}
