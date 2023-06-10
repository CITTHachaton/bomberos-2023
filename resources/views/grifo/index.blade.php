@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
<style>
    #map {
        height: 400px;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


@endpush
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Listado de grifos</h1>
{{-- <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button"
        class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi">
            <use xlink:href="#calendar3" />
        </svg>
        This week
    </button>
</div> --}}
</div>

{{-- <h2>Listado de grifos</h2> --}}
<div class="table-responsive small">
<table class="table table-striped table-sm" id="miTabla">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Año</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Latitud/Longitud</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
      @foreach ($grifos as $gri)
        <tr>
            {{-- <td>{{ $gri->id ? '1' : '0' }}</td> --}}
            <td>{{ $gri->id }}</td>
            <td>{{ $gri->nombre }}</td>
            <td>{{ $gri->anio }}</td>
            <td>{{ $gri->ubicacion }}</td>
            <td><code>{{ $gri->latitud . ' ' . $gri->longitud }}</code></td>
            <td>
              <a href="{{ route('grifos.show', $gri->id) }}" target="_blank" class="btn btn-sm btn-primary">
                <i class="fa-solid fa-earth-americas text-danger"></i>
              </a>

            </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>


@endsection
@push('javascript')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
  $('#miTabla').DataTable();
</script>
@endpush
