@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}" class="auth-container">
        @csrf

        <!-- Puedes mantener la imagen y el título centrados -->
        <div class="text-center mb-4">
            <img class="mb-2" src="{!! url('images/bootstrap-logo.svg') !!}" alt="Logo" width="72" height="57">
            <h1 class="h3 fw-normal">Registro</h1>
        </div>

        <!-- Fila 1: Nombre completo / Nombre de usuario -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre completo" required autofocus>
                    <label>Nombre completo</label>
                </div>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Nombre de usuario" required>
                    <label>Nombre de usuario</label>
                </div>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>
        </div>

        <!-- Fila 2: Correo electrónico / Número de teléfono -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required>
                    <label>Correo electrónico</label>
                </div>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Número de teléfono" required>
                    <label>Número de teléfono</label>
                </div>
                @if ($errors->has('phone'))
                    <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                @endif
            </div>
        </div>

        <!-- Fila 3: Contraseña / Confirmar contraseña -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    <label>Contraseña</label>
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>
                    <label>Confirmar contraseña</label>
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
        </div>

        <!-- Fila 4: Género (toda la fila) -->
        <div class="mb-3">
            <label class="d-block mb-2">Género</label>
            <div class="d-flex gap-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender_m" value="masculino" {{ old('gender') == 'masculino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender_m">Masculino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender_f" value="femenino" {{ old('gender') == 'femenino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender_f">Femenino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender_nd" value="no_declarar" {{ old('gender') == 'no_declarar' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender_nd">Prefiero no decirlo</label>
                </div>
            </div>
            @if ($errors->has('gender'))
                <span class="text-danger text-left">{{ $errors->first('gender') }}</span>
            @endif
        </div>

        <!-- Botón de Registro -->
        <div class="mb-3">
            <button class="btn btn-primary w-100" type="submit">Registrarse</button>
        </div>

        @include('auth.partials.copy')
    </form>
@endsection
