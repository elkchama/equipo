<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Tienda;

class ComparacionController extends Controller
{
    // Muestra la lista de productos
    public function index()
    {
        $productos = Producto::with('tienda')->get();
        return view('productos.index', compact('productos'));
    }

    // Función para comparar precios
    public function comparar(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Buscar el producto y sus precios en diferentes tiendas
        $producto = Producto::where('id', $productoId)->with('tienda')->get();

        // Buscar el precio más bajo
        $mejorPrecio = $producto->min('precio');

        // Encontrar la tienda con el precio más bajo
        $productoMasEconomico = $producto->where('precio', $mejorPrecio)->first();

        return view('productos.resultado', compact('productoMasEconomico', 'mejorPrecio'));
    }
}
