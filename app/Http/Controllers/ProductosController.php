<?php
// 📄 CONTROLADOR: app/Http/Controllers/ProductosController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\productos;
use App\Models\Tienda;
use Barryvdh\DomPDF\Facade as PDF;

class ProductosController extends Controller
{
    public function publicIndex()
    {
        $productos = productos::with('tienda')->get();
        return view('home.productos', compact('productos'));
    }

    public function index()
    {
        $productos = productos::with('tienda')->get();
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        $tiendas = Tienda::all();
        return view('admin.productos.create', compact('tiendas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'tienda_id' => 'required|exists:tiendas,id'
        ]);

        Productos::create($request->all());

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto creado correctamente.');
    }

    public function edit(Productos $producto)
    {
        $tiendas = Tienda::all();
        return view('admin.productos.edit', compact('producto', 'tiendas'));
    }

    public function update(Request $request, Productos $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'tienda_id' => 'required|exists:tiendas,id'
        ]);

        $producto->update($request->all());

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Productos $producto)
    {
        $producto->delete();

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto eliminado correctamente.');
    }

    public function comparar(Request $request)
    {
        $productoId = $request->input('producto_id');
        $producto = Productos::where('id', $productoId)
                            ->with('tienda')
                            ->get();

        $mejorPrecio = $producto->min('precio');
        $productoMasEconomico = $producto->firstWhere('precio', $mejorPrecio);

        return view('productos.resultado', compact('productoMasEconomico', 'mejorPrecio'));
    }

    /**
     * Generar un PDF con la lista de productos
     */
    public function generarPDF()
    {
        $productos = Productos::with('tienda')->get();

        $pdf = PDF::loadView('admin.productos.pdf', compact('productos'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('productos_tecnologicos.pdf');
    }
}
