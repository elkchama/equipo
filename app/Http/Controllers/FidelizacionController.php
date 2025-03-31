<?php

namespace App\Http\Controllers;

use App\Models\Fidelizacion;
use App\Models\User;
use Illuminate\Http\Request;

class FidelizacionController extends Controller
{
    public function index()
    {
        $fidelizaciones = Fidelizacion::with('user')->get();
        return view('fidelizacion.index', compact('fidelizaciones'));
    }

    public function create()
    {
        $users = User::all();
        return view('fidelizacion.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'finalidad' => 'required',
            'puntos_totales' => 'required|integer',
            'limite_puntos' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        Fidelizacion::create($request->all());
        return redirect()->route('fidelizacion.index');
    }

    public function edit(Fidelizacion $fidelizacion)
    {
        $users = User::all();
        return view('fidelizacion.edit', compact('fidelizacion', 'users'));
    }

    public function update(Request $request, Fidelizacion $fidelizacion)
    {
        $request->validate([
            'finalidad' => 'required',
            'puntos_totales' => 'required|integer',
            'limite_puntos' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        $fidelizacion->update($request->all());
        return redirect()->route('fidelizacion.index');
    }

    public function destroy(Fidelizacion $fidelizacion)
    {
        $fidelizacion->delete();
        return redirect()->route('fidelizacion.index');
    }
}
