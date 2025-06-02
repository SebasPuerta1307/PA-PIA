<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\Departamento; // Necesitamos este modelo para el select de departamentos
use Illuminate\Http\Request;

class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programas = Programa::with('departamento')->latest()->paginate(10);
        return view('programa.index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::orderBy('nombre')->get();
        return view('programa.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        Programa::create($request->all());

        return redirect()->route('programa.index')
                         ->with('success', 'Programa creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programa $programa)
    {
        $departamentos = Departamento::orderBy('nombre')->get();
        $programa->load('departamento');
        return view('programa.edit', compact('programa', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programa $programa)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $programa->update($request->all());

        return redirect()->route('programa.index')
                         ->with('success', 'Programa actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programa $programa)
    {
        $programa->delete();

        return redirect()->route('programa.index')
                         ->with('success', 'Programa eliminado exitosamente.');
    }
}
