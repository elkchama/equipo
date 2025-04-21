<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
class TiendaController extends Controller
{
    /**
     * Muestra un listado de las tiendas.
     */
    public function publicIndex()
{
    $tiendas = Tienda::all();
    return view('home.tiendas', compact('tiendas'));
}

    public function index()
    {
        $tiendas = Tienda::all();
        return view('admin.tiendas.index', compact('tiendas'));
    }

    /**
     * Muestra el formulario para crear una nueva tienda.
     */
    public function create()
    {
        return view('admin.tiendas.create');
    }

    /**
     * Guarda una nueva tienda en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'direccion'   => 'nullable|string',
        ]);

        Tienda::create($request->only('nombre', 'descripcion', 'direccion'));

        return redirect()->route('admin.tiendas.index')
                         ->with('success', 'Tienda creada correctamente.');
    }

    /**
     * Muestra una tienda específica.
     */
    public function show(Tienda $tienda)
    {
        return view('tiendas.show', compact('tienda'));
    }

    /**
     * Muestra el formulario para editar una tienda.
     */
    public function edit(Tienda $tienda)
    {
        return view('admin.tiendas.edit', compact('tienda'));
    }

    /**
     * Actualiza una tienda en la base de datos.
     */
    public function update(Request $request, Tienda $tienda)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'direccion'   => 'nullable|string',
        ]);

        $tienda->update($request->only('nombre', 'descripcion', 'direccion'));

        return redirect()->route('admin.tiendas.index')
                         ->with('success', 'Tienda actualizada correctamente.');
    }

    /**
     * Elimina una tienda de la base de datos.
     */
    public function destroy(Tienda $tienda)
    {
        $tienda->delete();

        return redirect()->route('admin.tiendas.index')
                         ->with('success', 'Tienda eliminada correctamente.');
    }

    /** generar pdf con la lista de tiendas  */
    public function generarPDF()
{
    $tiendas = Tienda::all();
    $pdf = PDF::loadView('admin.tiendas.pdf', compact('tiendas'));
    return $pdf->download('tiendas.pdf');
}
}
