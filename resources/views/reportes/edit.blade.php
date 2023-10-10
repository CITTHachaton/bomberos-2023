@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card text-left mt-3">
        <div class="card-body">


          <h2>Editar usuario</h2>

          @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->nombre }}">
              </div>
              <div class="mb-3">
                  <label for="correo" class="form-label">Correo</label>
                  <input type="email" class="form-control" id="correo" name="correo" value="{{ $usuario->correo }}">
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="mb-3">
                  <label for="cargo" class="form-label">Cargo</label>
                  <input type="text" class="form-control" id="cargo" name="cargo" value="{{ $usuario->cargo }}">
              </div>
              <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection
