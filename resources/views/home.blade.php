@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Inicio de Sesión exitoso.') }}


                </div>
                <div>
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">{{ __('Ir a Proyectos') }}</a>
                </div>
                <div style="margin-top: 10px;">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('Ver Usuarios') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
