<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'id_rol' => 'required|integer', // Asegurar que se defina un rol
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'id_rol' => $request->id_rol,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado correctamente');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'id_rol' => 'required|integer',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
