<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\productos;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $termino = $request->input('query'); // ← este es el nombre del input
        $productos = \App\Models\productos::with('tienda')
                        ->where('nombre', 'like', '%' . $termino . '%')
                        ->get();

        return view('home.search', [
            'productos' => $productos,
            'termino' => $termino
        ]);
    }
}
