@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Detalles del Usuario') }}</div>

                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">{{ __('Crear Proyecto') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Proyectos Relacionados') }}</div>

                <div class="card-body">
                    @if ($user->projects->isEmpty())
                        <p>{{ __('No hay proyectos relacionados.') }}</p>
                    @else
                        <ul>
                            @foreach ($user->projects as $project)
                                <li>
                                    <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary btn-sm">{{ __('Editar') }}</a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Eliminar') }}</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
