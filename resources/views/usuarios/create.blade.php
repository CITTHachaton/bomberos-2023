@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card text-left mt-3">
        <div class="card-body">
          {{-- <h4 class="card-title">Title</h4>
          <p class="card-text">Body</p> --}}


          <h2>Crear usuario</h2>

          @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form action="{{ route('usuarios.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
              </div>
              <div class="mb-3">
                  <label for="correo" class="form-label">Correo</label>
                  <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}">
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="mb-3">
                  <label for="cargo" class="form-label">Cargo</label>
                  <input type="text" class="form-control" id="cargo" name="cargo" value="{{ old('cargo') }}">
              </div>
              <button type="submit" class="btn btn-primary">Crear</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
