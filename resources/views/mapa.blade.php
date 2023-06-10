@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
<style>
    #map {
        height: 400px;
    }
</style>

@endpush
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Mapa de focos</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi">
            <use xlink:href="#calendar3" />
        </svg>
        This week
      </button>
  </div>
</div>

<div class="container">

  <div class="row">


    <h2>Section title</h2>
    <button onclick="getLocation()">Obtener Geolocalización</button>
    <div class="mt-3">
      <div id="map" class="shadow"></div>
    </div>
  </div>
</div>
@endsection
@push('javascript')

<script>
  function getLocation() {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
      } else {
          alert('La geolocalización no es compatible con este navegador.');
      }
  }

  function showPosition(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;

      // Enviar la latitud y longitud al servidor para su procesamiento
      // Puedes hacer una solicitud AJAX a tu ruta de Laravel para guardar los datos en la base de datos
      // Ejemplo: $.post('/guardar-geolocalizacion', {latitude: latitude, longitude: longitude});
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/heatmap.js/2.0.2/heatmap.min.js"></script>
<script>

  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;

      // Llamar a la función para mostrar el mapa con la ubicación
      mostrarMapa(latitude, longitude);
    });
  } else {
    alert("Geolocalización no disponible en tu navegador");
  }

  function mostrarMapa(latitude, longitude) {
    var map = L.map('map').setView([latitude, longitude], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker = L.marker([latitude, longitude]).addTo(map);
    marker.bindPopup("Tu ubicación").openPopup();
  }

  mostrarMapa();
</script>


@endpush
