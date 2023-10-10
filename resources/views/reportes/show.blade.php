@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del usuario</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $usuario->nombre }}</h5>
                <p class="card-text"><strong>Correo:</strong> {{ $usuario->correo }}</p>
                <p class="card-text"><strong>Cargo:</strong> {{ $usuario->cargo }}</p>
                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
