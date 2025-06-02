<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Programa; // Necesitamos este modelo para el select de programas
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaturas = Asignatura::with('programa')->latest()->paginate(10);
        return view('asignatura.index', compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programas = Programa::orderBy('nombre')->get();
        return view('asignatura.create', compact('programas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'programa_id' => 'required|exists:programas,id',
        ]);

        Asignatura::create($request->all());

        return redirect()->route('asignatura.index')
                         ->with('success', 'Asignatura creada exitosamente.');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignatura $asignatura)
    {
        $programas = Programa::orderBy('nombre')->get();
        $asignatura->load('programa');
        return view('asignatura.edit', compact('asignatura', 'programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'programa_id' => 'required|exists:programas,id',
        ]);

        $asignatura->update($request->all());

        return redirect()->route('asignatura.index')
                         ->with('success', 'Asignatura actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();

        return redirect()->route('asignatura.index')
                         ->with('success', 'Asignatura eliminada exitosamente.');
    }
}