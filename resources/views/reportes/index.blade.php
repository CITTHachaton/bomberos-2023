@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de usuarios</h2>


        <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Crear usuario</a>

        <div class="row">
          <div class="card text-left shadow">
            <div class="card-body">
              @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
              @endif
              <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripcion</th>
                            <th>Usuario</th>
                            {{-- <th>Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reportes as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->descripcion }}</td>
                                <td>{{ $r->usuario->nombre }}</td>
                                <td>{{ $r->grifo->ubicacion }}</td>
                                <td>{{ $r->grifo->latitud . ' ' . $r->grifo->longitud }}</td>
                                <td>
                                  <a href="{{ route('grifos.show', $r->grifo->id) }}" target="_blank" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-earth-americas text-danger"></i>
                                  </a>

                                {{-- <td>{{ $usuario->cargo }}</td> --}}
                                {{-- <td>
                                    <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

    </div>
@endsection
