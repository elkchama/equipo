<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show() {
        if (Auth::check()) {
            return match (Auth::user()->id_rol) {
                1 => redirect()->route('admin.dashboard'),
                2 => redirect()->route('home.busquedas'),

            };
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->route('login.show')
                ->withErrors(trans('auth.failed'));
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user)
    {
        return match ($user->id_rol) {
            1 => redirect()->route('dashboard'),
            2 => redirect()->route('home.busquedas'),
        };
    }
}
