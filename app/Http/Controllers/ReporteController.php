<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function generarPDF()
    {
        $productos = [
            ['nombre' => 'Monitor 24"', 'precio' => 200, 'tienda' => 'ElectroShop'],
            ['nombre' => 'Monitor 24"', 'precio' => 190, 'tienda' => 'SuperTech'],
        ];

        $pdf = Pdf::loadView('reportes.productos', compact('productos'));
        return $pdf->download('reporte_comparacion.pdf');
    }
}
