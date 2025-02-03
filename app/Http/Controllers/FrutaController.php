<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fruta;

class FrutaController extends Controller {

    


    public function index() {
        $fruta = Fruta::get();
        return view('fruteria.index', compact('fruta'));
    }

    // VISTA PARA AÑADIR FRUTA
    public function create() {
        return view('fruteria.create');
    }


    // CREAR FRUTA
    public function store(Request $request) {
        
        $request->validate([
            'imagen' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'temporada' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $fruta = new Fruta();
        $fruta->nombre = $request->get('nombre');
        $fruta->temporada = $request->get('temporada');
        $fruta->precio = $request->get('precio');
        $fruta->stock = $request->get('stock');
        $fruta->imagen = $request->get('imagen');
        $fruta->save();

        return redirect()->route('fruteria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $fruta = Fruta::where('id', $id)->get();
        return view('fruteria.show', compact('fruta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $fruta = Fruta::where('id', $id)->get();
        return view('fruteria.edit', compact('fruta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        
        $request->validate([
            'imagen' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'temporada' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $fruta = Fruta::findOrFail($id);
        $fruta->stock = $request->input('imagen');
        $fruta->nombre = $request->input('nombre');
        $fruta->temporada = $request->input('temporada');
        $fruta->precio = $request->input('precio');
        $fruta->stock = $request->input('stock');
        $fruta->save();

        return redirect()->route('fruteria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $fruta = Fruta::findOrFail($id);
        $fruta->delete();
        return redirect()->route('fruteria.index');
    }
}
