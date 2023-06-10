@extends('layout')

@section('content')
    <div class="container">
        <h2>Detalles del usuario</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->nombre }}</h5>
                <p class="card-text"><strong>Correo:</strong> {{ $user->correo }}</p>
                <p class="card-text"><strong>Cargo:</strong> {{ $user->cargo }}</p>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
