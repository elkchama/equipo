@extends('layouts.auth-master')

@section('content')
<div class="login-container">
  <div class="login-card">
    <!-- Botón de Volver -->
    <a href="{{ url('/') }}" class="btn-back">
      &larr; Volver
    </a>

    <!-- Logo -->
    <div class="logo">
      <img src="{!! url('vista/img/logo.png') !!}" alt="CONFER Logo">
    </div>

    <!-- Título -->
    <h1>Iniciar Sesión</h1>

    <!-- Formulario de Login -->
    <form method="post" action="{{ route('login.perform') }}" class="login-form" id="login-form">
      @csrf
      @include('layouts.partials.messages')

      <!-- Campo: Usuario -->
      <div class="input-group">
        <label for="username">Usuario</label>
        <input
          type="text"
          id="username"
          name="username"
          value="{{ old('username') }}"
          placeholder="Ingresa tu usuario"
          required
          autofocus
        >
        @if ($errors->has('username'))
          <span class="text-danger">{{ $errors->first('username') }}</span>
        @endif
      </div>

      <!-- Campo: Contraseña -->
      <div class="input-group">
        <label for="password">Contraseña</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Ingresa tu contraseña"
          required
        >
        @if ($errors->has('password'))
          <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
      </div>

      <!-- Botón de Ingresar -->
      <button type="submit" class="btn-login">Ingresar</button>
    </form>

    <!-- Enlace para Registro -->
    <p class="signup-link">
      ¿No tienes cuenta?
      ¿No tienes cuenta? <a href="{{ route('register.perform') }}">Regístrate aquí</a>

    </p>
  </div>
</div>
@endsection
