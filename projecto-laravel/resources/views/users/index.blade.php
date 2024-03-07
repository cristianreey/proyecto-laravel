@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12 text-right"> <!-- Alineación a la derecha -->
            <a href="{{ route('users.create') }}" class="btn btn-primary">{{ __('Crear Usuario') }}</a> <!-- Botón para crear un nuevo usuario -->
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista de Usuarios') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha de Verificación de Correo Electrónico</th>
                                    <th>Contraseña</th>
                                    <th>Recordar Inicio de Sesión</th>
                                    <th>Fecha de Creación del Usuario</th>
                                    <th>Fecha de la Última Modificación</th>
                                    <th>Acciones</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->email_verified_at }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td>{{ $user->remember_token }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a> 
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">{{ __('Editar') }}</a> 
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('¿Estás seguro de que deseas eliminar este usuario?') }}')">{{ __('Eliminar') }}</button> <!-- Botón para eliminar el usuario -->
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
