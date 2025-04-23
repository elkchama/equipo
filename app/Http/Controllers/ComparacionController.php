<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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

        // Guardar datos en sesión para el PDF
        $request->session()->put('comparacion_data', [
            'producto' => $productoSeleccionado->nombre,
            'resultados' => $productos->map(function ($item) {
                return [
                    'Tienda' => $item->tienda,
                    'Precio' => $item->precio
                ];
            })->toArray(),
            'precioMasBajo' => $precioMasBajo
        ]);

        // Retornamos todos los registros y el precio más bajo a la vista
        return view('home.comparacion.resultado', compact('productos', 'precioMasBajo'));
    }

    // Método para generar el PDF
    public function generarPDF(Request $request)
    {
        // Obtener datos de la sesión
        $data = $request->session()->get('comparacion_data');

        if (!$data) {
            return redirect()->route('comparacion.index')
                ->with('error', 'No hay datos de comparación para generar el PDF. Realice una comparación primero.');
        }

        // Calcular diferencia entre precio más alto y más bajo
        $precios = array_column($data['resultados'], 'Precio');
        $precioMasAlto = max($precios);
        $diferencia = $precioMasAlto - $data['precioMasBajo'];

        // Datos adicionales para la vista
        $data['diferencia'] = $diferencia;
        $data['precioMasAlto'] = $precioMasAlto;

        // Configurar el PDF
        $pdf = PDF::loadView('tiendas.pdf', $data)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif'
            ]);

        // Nombre del archivo
        $nombreArchivo = 'Comparacion_' . str_replace(' ', '_', $data['producto']) . '_' . date('Ymd_His') . '.pdf';

        // Descargar el PDF
        return $pdf->download($nombreArchivo);
    }
}
