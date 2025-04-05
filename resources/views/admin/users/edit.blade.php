@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Género</label>
            <select name="gender" class="form-control">
                <option value="">Seleccione</option>
                <option value="masculino" {{ $user->gender == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ $user->gender == 'femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="otro" {{ $user->gender == 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (opcional)</label>
            <input type="password" name="password" class="form-control" placeholder="Solo si desea cambiarla">
        </div>

        <div class="mb-3">
            <label for="id_rol" class="form-label">Rol</label>
            <select name="id_rol" class="form-control" required>
                <option value="1" {{ $user->id_rol == 1 ? 'selected' : '' }}>Administrador</option>
                <option value="2" {{ $user->id_rol == 2 ? 'selected' : '' }}>Usuario</option>
                {{-- Igual que en create, esto debería ser dinámico desde la tabla roles idealmente --}}
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
