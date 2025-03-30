<?php

namespace App\Http\Controllers;

use App\Models\Busqueda;
use Illuminate\Http\Request;

class BusquedasController extends Controller
{
    /**
     * Muestra un listado de las búsquedas.
     */
    public function index()
{
    $busquedas = Busqueda::all();
    return view('auth.busquedas', compact('busquedas'));
}

    /**
     * Muestra el formulario para crear una nueva búsqueda.
     */
    public function create()
    {
        return view('busquedas.create');
    }

    /**
     * Guarda una nueva búsqueda en la base de datos y la relaciona con el usuario autenticado.
     */
    public function store(Request $request)
    {
        $request->validate([
            'resultados' => 'nullable|string',
            'recientes'  => 'nullable|string',
            'fecha'     => 'nullable|date',
        ]);

        // Creamos la búsqueda
        $busqueda = Busqueda::create($request->only('resultados', 'recientes', 'fecha'));

        return redirect()->route('busquedas.index')
            ->with('success', 'Búsqueda creada y asociada correctamente.');
    }

    /**
     * Muestra una búsqueda específica.
     */
    public function show(Busqueda $busqueda)
    {
        return view('busquedas.show', compact('busqueda'));
    }

    /**
     * Muestra el formulario para editar una búsqueda.
     */
    public function edit(Busqueda $busqueda)
    {
        return view('busquedas.edit', compact('busqueda'));
    }

    /**
     * Actualiza una búsqueda en la base de datos.
     */
    public function update(Request $request, Busqueda $busqueda)
    {
        $request->validate([
            'resultados' => 'nullable|string',
            'recientes'  => 'nullable|string',
            'fecha'     => 'nullable|date',
        ]);

        $busqueda->update($request->only('resultados', 'recientes', 'fecha'));

        return redirect()->route('busquedas.index')
            ->with('success', 'Búsqueda actualizada correctamente.');
    }

    /**
     * Elimina una búsqueda de la base de datos.
     */
    public function destroy(Busqueda $busqueda)
    {
        $busqueda->delete();
        return redirect()->route('busquedas.index')
            ->with('success', 'Búsqueda eliminada correctamente.');
    }
}

/** aver, me aparece el siguiente error View [auth.partials.busquedas] not found. (te envio una imagen para que mires la ruta de la vista)
*/
