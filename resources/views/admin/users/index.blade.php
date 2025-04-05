@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver al Dashboard</a>

    <h1>Lista de Usuarios</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Nuevo Usuario</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Username</th>  <!-- Nueva columna -->
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>  <!-- Mostrar el username -->
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->nombre }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
