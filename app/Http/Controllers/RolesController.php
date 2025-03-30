<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    // Mostrar todos los roles
    public function index()
    {
        $roles = Roles::all();
        return view('roles.index', compact('roles'));
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:255']);
        $role = Roles::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente');
    }

    // Mostrar un rol específico
    public function show($id)
    {
        $role = Roles::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    // Actualizar un rol
    public function update(Request $request, $id)
    {
        $request->validate(['nombre' => 'required|string|max:255']);
        $role = Roles::findOrFail($id);
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente');
    }

    // Eliminar un rol
    public function destroy($id)
    {
        $role = Roles::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente');
    }
}