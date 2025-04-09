<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('home.index');
        }

        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // Crear el nuevo usuario con los datos validados
        $user = User::create($request->validated());

        // NO iniciar sesión automáticamente
        // auth()->login($user); ← esta línea fue eliminada

        // Redirigir al login con mensaje flash
        return redirect()->route('login.show')->with('success', "Cuenta registrada correctamente. Ahora puedes iniciar sesión.");
    }
}
