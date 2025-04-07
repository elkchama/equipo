<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComparacionController extends Controller
{

    // Método para listar productos y mostrar el formulario de comparación
    public function index()
    {
        // Obtener productos únicos por nombre usando groupBy
        $productos = DB::table('productos')
            ->select('nombre', DB::raw('MIN(id) as id')) // Tomar el primer ID para cada nombre
            ->groupBy('nombre')
            ->get();

        // Enviar la lista de productos a la vista
        return view('home.comparacion.index', compact('productos'));
    }

    // Método para realizar la comparación de precios
    public function comparar(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Obtener el nombre del producto por su ID
        $productoSeleccionado = DB::table('productos')->where('id', $productoId)->first();

        if (!$productoSeleccionado) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }

        // Buscar todos los registros del producto (por nombre) en distintas tiendas
        $productos = DB::table('productos')
            ->join('tiendas', 'productos.tienda_id', '=', 'tiendas.id')
            ->select('productos.nombre as producto', 'tiendas.nombre as tienda', 'productos.precio')
            ->where('productos.nombre', $productoSeleccionado->nombre)
            ->orderBy('productos.precio', 'ASC')
            ->get();

        if ($productos->isEmpty()) {
            return redirect()->back()->with('error', 'No se encontraron precios para este producto.');
        }

        // Obtener el precio más bajo entre todos los registros
        $precioMasBajo = $productos->min('precio');

        // Retornamos todos los registros y el precio más bajo a la vista
        return view('home.comparacion.resultado', compact('productos', 'precioMasBajo'));
    }
}
