<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Facultades; // Necesitamos este modelo para el select de facultades


class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = Departamento::with('facultad')->latest()->paginate(10); // Carga la relación facultad
        return view('departamento.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $facultades = Facultades::orderBy('nombre')->get(); // Obtener todas las facultades para el select
        return view('departamento.create', compact('facultades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'facultad_id' => 'required|exists:facultades,id',
        ]);

        Departamento::create($request->all());

        return redirect()->route('departamento.index')
                         ->with('success', 'Departamento creado exitosamente.');
    }

    
    
    public function edit(Departamento $departamento)
    {
        $facultades = Facultades::orderBy('nombre')->get();
        // Carga la relación facultad para el formulario de edición
        $departamento->load('facultad');
        return view('departamento.edit', compact('departamento', 'facultades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'facultad_id' => 'required|exists:facultades,id',
        ]);

        $departamento->update($request->all());

        return redirect()->route('departamento.index')
                         ->with('success', 'Departamento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect()->route('departamento.index')
                         ->with('success', 'Departamento eliminado exitosamente.');
    }
}