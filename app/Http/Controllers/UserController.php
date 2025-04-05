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
            'phone' => 'required|string|max:20|unique:users',
            'gender' => 'nullable|string',
            'password' => 'required|string|min:6',
            'id_rol' => 'required|integer',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'password' => $request->password, // se cifra automáticamente en el modelo
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
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
            'gender' => 'nullable|string',
            'id_rol' => 'required|integer',
            'password' => 'nullable|string|min:6',
        ]);

        $data = $request->only(['name', 'email', 'username', 'phone', 'gender', 'id_rol']);

        // Solo actualiza la contraseña si fue enviada
        if ($request->filled('password')) {
            $data['password'] = $request->password; // será encriptada por el modelo
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
