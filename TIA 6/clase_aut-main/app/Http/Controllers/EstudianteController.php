<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Programa;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $estudiantes = Estudiante::with('programa')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $programas = Programa::all();
        return view('estudiantes.create', compact('programas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:estudiantes',
            'programa_id' => 'required|exists:programas,id'
        ]);

        Estudiante::create($request->all());
        return redirect()->route('estudiantes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(Estudiante $estudiante) {
        $programas = Programa::all();
        return view('estudiantes.edit', compact('estudiante', 'programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:estudiantes,correo,' . $estudiante->id,
            'programa_id' => 'required|exists:programas,id'
        ]);

        $estudiante->update($request->all());
        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante) {
        $estudiante->delete();
        return redirect()->route('estudiantes.index');
    }
}
