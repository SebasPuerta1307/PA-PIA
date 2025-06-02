<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;

use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    public function index() {
        $institucion = Instituciones::all();
        return view('institucion.index', compact('institucion'));
    }

    public function create() {
        //dd("HOLA!");
        return view('institucion.create');
    }

    public function store(Request $request) {
        //dd($request->all());
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);


        //dd($request->all());

        Instituciones::create($request->all());

        return redirect()->route('institucion.index')
                         ->with('success', 'Institución creada exitosamente.');
    }

    public function edit(Instituciones $institucion) {
        return view('institucion.edit', compact('institucion'));
    }

    public function update(Request $request, Instituciones $institucion) {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $institucion->update($request->all());

        return redirect()->route('institucion.index')
                         ->with('success', 'Institucion actualizada.');
    }

    public function destroy(instituciones $institucion) {
        $institucion->delete();

        return redirect()->route('institucion.index')
                         ->with('success', 'Institucion eliminada.');
    }
}
