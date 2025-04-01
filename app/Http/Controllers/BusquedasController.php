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
        $busquedas = Busqueda::with('tiendas')->get(); // Carga las relaciones
        return view('home.busquedas', compact('busquedas'));
    }

    /**
     * Muestra el formulario para crear una nueva búsqueda.
     */
    public function create()
    {
        // Si necesitas enviar las tiendas disponibles para elegir:
        $tiendas = \App\Models\Tienda::all();
        return view('busquedas.create', compact('tiendas'));
    }

    /**
     * Guarda una nueva búsqueda en la base de datos y la asocia a tiendas.
     */
    public function store(Request $request)
    {
        $request->validate([
            'resultados' => 'nullable|string',
            'recientes'  => 'nullable|string',
            'fecha'     => 'nullable|date',
            'tienda_ids' => 'nullable|array',      // Validación para un arreglo de IDs
            'tienda_ids.*' => 'exists:tiendas,id',   // Cada ID debe existir en la tabla tiendas
        ]);

        // Creamos la búsqueda
        $busqueda = Busqueda::create($request->only('resultados', 'recientes', 'fecha'));

        // Si se enviaron IDs de tiendas, asociamos la búsqueda a estas tiendas
        if ($request->has('tienda_ids')) {
            $busqueda->tiendas()->attach($request->input('tienda_ids'));
        }

        return redirect()->route('busquedas.index')
            ->with('success', 'Búsqueda creada y asociada correctamente.');
    }

    /**
     * Muestra una búsqueda específica.
     */
    public function show(Busqueda $busqueda)
    {
        // Cargar relación de tiendas si es necesario
        $busqueda->load('tiendas');
        return view('busquedas.show', compact('busqueda'));
    }

    /**
     * Muestra el formulario para editar una búsqueda.
     */
    public function edit(Busqueda $busqueda)
    {
        // Traemos todas las tiendas para permitir seleccionar o modificar la asociación
        $tiendas = \App\Models\Tienda::all();
        // Cargamos las tiendas asociadas para marcarlas en el formulario, si es necesario
        $busqueda->load('tiendas');
        return view('busquedas.edit', compact('busqueda', 'tiendas'));
    }

    /**
     * Actualiza una búsqueda en la base de datos y sincroniza la relación con tiendas.
     */
    public function update(Request $request, Busqueda $busqueda)
    {
        $request->validate([
            'resultados' => 'nullable|string',
            'recientes'  => 'nullable|string',
            'fecha'     => 'nullable|date',
            'tienda_ids' => 'nullable|array',
            'tienda_ids.*' => 'exists:tiendas,id',
        ]);

        // Actualizamos los datos de la búsqueda
        $busqueda->update($request->only('resultados', 'recientes', 'fecha'));

        // Sincronizamos la relación con tiendas: si se envían IDs, se sincronizan;
        // si no se envían, se pueden quitar todas las asociaciones o dejarlas.
        if ($request->has('tienda_ids')) {
            $busqueda->tiendas()->sync($request->input('tienda_ids'));
        } else {
            // Si no se seleccionan tiendas, se elimina la relación
            $busqueda->tiendas()->detach();
        }

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
