@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<style>
  #map {
    height: 400px;
  }
</style>
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

<div id="map"></div>




@endsection
@push('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
<script>
  function initMap() {
    // Coordenadas de ejemplo
    var latitud = {{ $g->latitud }};
    var longitud = {{ $g->longitud }};

    // Crear el mapa
    var map = L.map('map').setView([latitud, longitud], 22);

    // Agregar el mapa base de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Marcar la ubicación con un punto
    L.marker([latitud, longitud]).addTo(map);
  }
</script>

<script>
  initMap();
</script>
@endpush
