<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:docentes'
        ]);

        Docente::create($request->all());
        return redirect()->route('docentes.index');
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
    public function edit(Docente $docente) {
        return view('docentes.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docente $docente) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:docentes,correo,' . $docente->id
        ]);

        $docente->update($request->all());
        return redirect()->route('docentes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docente $docente) {
        $docente->delete();
        return redirect()->route('docentes.index');
    }
}
