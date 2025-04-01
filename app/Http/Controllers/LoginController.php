<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show() {
        if (Auth::check()) {
            return redirect()->route('home.busquedas');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) {
            return redirect()->route('login')
                ->withErrors(['auth' => 'Credenciales incorrectas.']);
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        
        if (Auth::check()) {
            return redirect()->route('home.busquedas');
        }
        return view('auth.login');

    }
}
