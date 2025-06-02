<?php

namespace App\Http\Controllers;

use App\Models\TiposProyecto;
use Illuminate\Http\Request;

class TiposProyectoController extends Controller {
    
    public function index() {
        $tipos = TiposProyecto::all();
        return view('tipos_proyecto.index', compact('tipos'));
    }

    public function create() {
        //dd("HOLA!");
        return view('tipos_proyecto.create');
    }

    public function store(Request $request) {
        //dd($request->all());
        $request->validate([
            'codigo' => 'required|string|max:10',
            'descripcion' => 'required|string|max:255',
        ]);


        //dd($request->all());

        TiposProyecto::create($request->all());

        return redirect()->route('tipos_proyecto.index')
                         ->with('success', 'Tipo de proyecto creado exitosamente.');
    }

    public function edit(TiposProyecto $tiposProyecto) {
        return view('tipos_proyecto.edit', compact('tiposProyecto'));
    }

    public function update(Request $request, TiposProyecto $tiposProyecto) {
        $request->validate([
            'codigo' => 'required|string|max:10',
            'descripcion' => 'required|string|max:255',
        ]);

        $tiposProyecto->update($request->all());

        return redirect()->route('tipos_proyecto.index')
                         ->with('success', 'Tipo de proyecto actualizado.');
    }

    public function destroy(TiposProyecto $tiposProyecto) {
        $tiposProyecto->delete();

        return redirect()->route('tipos_proyecto.index')
                         ->with('success', 'Tipo de proyecto eliminado.');
    }
}
