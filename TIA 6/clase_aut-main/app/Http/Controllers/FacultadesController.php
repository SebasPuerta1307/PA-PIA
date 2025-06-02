<?php

namespace App\Http\Controllers;

use App\Models\Facultades;
use App\Models\Instituciones;
use Illuminate\Http\Request;

class FacultadesController extends Controller
{
    public function index()
    {
        $facultad = Facultades::with('institucion')->get();
        return view('facultad.index', compact('facultad'));
    }

    public function create()
    {
        $instituciones = Instituciones::all();
        return view('facultad.create', compact('instituciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'institucion_id' => 'required|exists:instituciones,id'
        ]);

        Facultades::create($request->all());

        return redirect()->route('facultad.index')
                         ->with('success', 'Facultad creada exitosamente.');
    }

    public function edit(Facultades $facultad)
    {
        $instituciones = Instituciones::all();
        return view('facultad.edit', compact('facultad', 'instituciones'));
    }

    public function update(Request $request, Facultades $facultad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'institucion_id' => 'required|exists:instituciones,id'
        ]);

        $facultad->update($request->all());

        return redirect()->route('facultad.index')
                         ->with('success', 'Facultad actualizada exitosamente.');
    }

    public function destroy(Facultades $facultad)
    {
        $facultad->delete();

        return redirect()->route('facultad.index')
                         ->with('success', 'Facultad eliminada exitosamente.');
    }

}
