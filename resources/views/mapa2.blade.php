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

    <div>
      <div class="table-responsive">
        <table class="table table-sm">
          <tbody>
            <tr class="">
              <td><img src="{{ asset('img/negro.svg') }}" width="30" alt="" srcset=""> Pendiente</td>
              <td><img src="{{ asset('img/verde.svg') }}" width="20" alt="" srcset=""> Disponible</td>
              <td><img src="{{ asset('img/amarillo.svg') }}" width="20" alt="" srcset="">Con Problemas</td>
            </tr>
            <tr class="">
              <td><img src="{{ asset('img/blue.svg') }}" width="20" alt="" srcset="">Abierto</td>
              <td><img src="{{ asset('img/rojo.svg') }}" width="20" alt="" srcset="">No disponible</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" hidden id="btnModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Reportar grifos
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reportar grifo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('grifos.update_a') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <input type="text" name="id_global" id="id_global">
              <div class="form-group mb-3">
                  <label for="estado">Estado:</label>
                  <select name="estado" id="estado" class="form-control"  required>
                      <option value="1">Pendiente</option>
                      <option value="2">Disponible</option>
                      <option value="3">Con Problemas</option>
                      <option value="4">Abierto</option>
                      <option value="5">No Existe</option>
                  </select>
              </div>
              <div class="mb-3">
                <label for="comentario" class="form-label">Comentario</label>
                <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<button type="button" hidden id="btnNuew" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example2Modal">
  Reportar grifos
</button>

<div class="modal fade" id="example2Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo grifo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('grifos.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="form-group mb-3">
                <label for="">Latitud</label>
                <input type="text" class="form-control" readonly name="latitud" id="latitud">
              </div>

              <div class="form-group mb-3">
                <label for="">Longitud</label>
                <input type="text" class="form-control" readonly name="longitud" id="longitud">
              </div>

              <div class="form-group mb-3">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-control"  required>
                  <option value="1">Pendiente</option>
                  <option value="2">Disponible</option>
                  <option value="3">Con Problemas</option>
                  <option value="4">Abierto</option>
                  <option value="5">No Existe</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="comentario" class="form-label">Comentario</label>
                <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Añadir nuevo</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


@include('_nav')

@endsection
@push('javascript')

<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/heatmap.js/2.0.2/heatmap.min.js"></script>
<script>
  var latitude = localStorage.getItem('latitude');
  var longitude = localStorage.getItem('longitude');
  var modalOpen = false;
  // Función para calcular la distancia entre dos puntos en coordenadas geográficas
  function calcularDistancia(lat1, lon1, lat2, lon2) {
    var R = 6371; // Radio de la Tierra en kilómetros
    var dLat = (lat2 - lat1) * (Math.PI / 180);
    var dLon = (lon2 - lon1) * (Math.PI / 180);
    var a =
      Math.sin(dLat / 2) * Math.sin(dLat / 2) +
      Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
      Math.sin(dLon / 2) * Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var distancia = R * c; // Distancia en kilómetros
    return distancia;
  }

  var grifos = @json($grifos_raw);

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

  var data = grifos.filter(function(grifo) {
    var distancia = calcularDistancia(latitude, longitude, grifo.latitud, grifo.longitud);
    return distancia <= 1; // Filtrar grifos dentro de 1 km (puedes ajustar la distancia según tus necesidades)
  });


  for (var i = 0; i < data.length; i++) {
    var point = data[i];
    var estado = '0';
    if (point.estado) {
      estado = point.estado;
    }

    var marker = L.marker([point.latitud, point.longitud], {
        pointId: point.id,
        pointStatus: estado,
        icon: L.icon({
          iconUrl: point.img,
          iconSize: [25, 25]
        })
    }).addTo(map);

    if (point.direccion) {
      marker.bindPopup("<b>ID:</b> " + point.id + "<br><b>Direccion:</b> " + point.direccion);
    } else{
      marker.bindPopup("<b>ID:</b> " + point.id + "<br><b>Estado:</b> " + point.estado);

    }

    marker.on('mouseover', function(e) {
        this.openPopup();
    });

    marker.on('mouseout', function(e) {
        this.closePopup();
    });

    marker.on('click', function(e) {
      // this.openPopup();
      var pointId = e.target.options.pointId;
      var pointEstado = e.target.options.pointStatus;
      // console.log("ID: " + pointId);
      // console.log(e);
      reportarModal(pointId, pointEstado);
    });
  }

  function mostrarPosicion() {
    navigator.geolocation.getCurrentPosition(function(position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        L.marker([lat, lng]).addTo(map);
    });
  }

      var iconPerson = L.icon({
        iconUrl: '{{ asset('img/bombero.png') }}', // Reemplaza con la ruta a tu imagen de ícono de persona
        // iconUrl: '{{ asset('img/fuego.png') }}', // Reemplaza con la ruta a tu imagen de ícono de persona
        iconSize: [32, 32], // Ajusta el tamaño según tus necesidades
        iconAnchor: [16, 32] // Ajusta el punto de anclaje según tus necesidades
      });

      var marker = L.marker([latitude, longitude], {
        icon: iconPerson
      }).addTo(map);

      marker.bindPopup("¡Aquí estoy!");

      map.setView([latitude, longitude], 15); // Centrar el mapa en la posición actual


  function reportarModal(id, estado) {
    console.log(id);
    console.log(estado);
    modalOpen = true;

    document.getElementById('id_global').value = id;

    var btnModal = document.getElementById('btnModal');
    btnModal.click();
  }

  function onMapClick(e) {
    console.log('Latitud:',);
    console.log('Longitud:', e.latlng.lng);


    // alert(e);

    if (!modalOpen) {
      document.getElementById('latitud').value =  e.latlng.lat;
      document.getElementById('longitud').value = e.latlng.lng;
      var btnNuew = document.getElementById('btnNuew');
      btnNuew.click();
    }
  }

  map.on('click', onMapClick);

  const myModalEl = document.getElementById('exampleModal')
  myModalEl.addEventListener('hidden.bs.modal', event => {
    modalOpen = false;
  });

</script>
@endpush
