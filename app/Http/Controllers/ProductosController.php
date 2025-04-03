<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\productos;
use App\Models\Tienda;

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

     /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        $tiendas = Tienda::all(); // Obtener todas las tiendas para asignarlas a un producto
        return view('admin.productos.create', compact('tiendas'));
    }

      /**
     * Almacena un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'tienda_id' => 'required|exists:tiendas,id'
        ]);

        productos::create($request->all());

        return redirect()->route('admin.productos.index')->with('success', 'Producto creado correctamente.');
    }

     /**
     * Muestra el formulario de edición de un producto.
     */
    public function edit(productos $producto)
    {
        $tiendas = Tienda::all();
        return view('admin.productos.edit', compact('producto', 'tiendas'));
    }

       /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, productos $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'tienda_id' => 'required|exists:tiendas,id'
        ]);

        $producto->update($request->all());

        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado correctamente.');
    }

     /**
     * Elimina un producto de la base de datos.
     */
    public function destroy(productos $producto)
    {
        $producto->delete();

        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    // Función para comparar precios
    public function comparar(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Buscar el producto y sus precios en diferentes tiendas
        $producto = productos::where('id', $productoId)->with('tienda')->get();

        // Buscar el precio más bajo
        $mejorPrecio = $producto->min('precio');

        // Encontrar la tienda con el precio más bajo
        $productoMasEconomico = $producto->where('precio', $mejorPrecio)->first();

        return view('productos.resultado', compact('productoMasEconomico', 'mejorPrecio'));
    }
}
