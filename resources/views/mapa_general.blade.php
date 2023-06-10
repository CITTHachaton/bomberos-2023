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
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
</div> --}}

<div class="container">
  <div class="row">
    {{-- <button onclick="mostrarPosicion()" class="btn btn-primary">Mostrar Posición</button> --}}
    <h2>🚒 Mapa de maipu</h2>
    <div class="mt-3">
      <div id="map" class="shadow"></div>
    </div>
  </div>
</div>
@endsection
@push('javascript')

<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/heatmap.js/2.0.2/heatmap.min.js"></script>
<script>
  var data = @json($grifos_raw);

  var map = L.map('map').setView([-33.516666666667, -70.766666666667], 13);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
  }).addTo(map);

  // var points = [
  //   { lat: 51.505, lng: -0.09, color: 'green' },
  //   { lat: 51.51, lng: -0.1, color: 'yellow' },
  //   { lat: 51.505, lng: -0.11, color: 'red' }
  // ];

  // for (var i = 0; i < points.length; i++) {
  //   var point = points[i];
  //   L.circleMarker([point.lat, point.lng], { color: point.color }).addTo(map);
  // }





  for (var i = 0; i < data.length; i++) {
    var point = data[i];
    var marker = L.marker([point.latitud, point.longitud], {
        icon: L.icon({
          iconUrl: point.img,
          iconSize: [25, 25]
        })
    }).addTo(map);

    marker.bindPopup("<b>ID:</b> " + point.id + "<br><b>Estado:</b> " + point.estado);

    marker.on('mouseover', function(e) {
        this.openPopup();
    });

    marker.on('mouseout', function(e) {
        this.closePopup();
    });
  }

  function mostrarPosicion() {
    navigator.geolocation.getCurrentPosition(function(position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        L.marker([lat, lng]).addTo(map);
    });
  }

</script>
@endpush
