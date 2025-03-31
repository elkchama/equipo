<?php
// ComparacionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos; // Usando el nombre personalizado

class ComparacionController extends Controller
{
    public function index()
    {
        $productos = productos::with('tienda')->get(); // Usando el modelo "productos"

        return view('home.comparacion.index', compact('productos'));
    }

    public function comparar(Request $request)
    {
        $productoId = $request->input('producto_id');

        $productos = productos::where('id', $productoId)->with('tienda')->get();

        if ($productos->isEmpty()) {
            return redirect()->back()->with('error', 'No se encontraron precios para este producto.');
        }

        return view('home.comparacion.resultado', compact('productos'));
    }
}
