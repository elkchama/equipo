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
            ->groupBy('nombre') // Agrupar por nombre para evitar duplicados
            ->get();

        // Enviar la lista de productos a la vista
        return view('home.comparacion.index', compact('productos'));
    }

    // Método para realizar la comparación de precios
    public function comparar(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Consulta para obtener precios por tienda del producto seleccionado
        $productos = DB::table('productos')
            ->join('tiendas', 'productos.tienda_id', '=', 'tiendas.id')
            ->select('productos.nombre as producto', 'tiendas.nombre as tienda', 'productos.precio')
            ->where('productos.id', $productoId)
            ->orderBy('productos.precio', 'ASC')
            ->get();

        if ($productos->isEmpty()) {
            return redirect()->back()->with('error', 'No se encontraron precios para este producto.');
        }

        // Obtener el precio más bajo
        $precioMasBajo = $productos->first()->precio;
        $comparacion = $productos->filter(function ($producto) use ($precioMasBajo) {
            return $producto->precio == $precioMasBajo;
        });

        return view('home.comparacion.resultado', compact('comparacion'));
    }
}
