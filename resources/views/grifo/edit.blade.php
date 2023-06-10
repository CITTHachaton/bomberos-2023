@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Grifo</h1>
        <form action="{{ route('grifos.update', $g->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-control"  required>
                    <option value="1" {{ $g->estatus == 1 ? 'selected' : '' }}>Pendiente</option>
                    <option value="2" {{ $g->estatus == 2 ? 'selected' : '' }}>Disponible</option>
                    <option value="3" {{ $g->estatus == 3 ? 'selected' : '' }}>Con Problemas</option>
                    <option value="4" {{ $g->estatus == 4 ? 'selected' : '' }}>Abierto</option>
                    <option value="5" {{ $g->estatus == 5 ? 'selected' : '' }}>No Existe</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection








