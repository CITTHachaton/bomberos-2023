@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')


<div class="container">
  <div class="row justify-content-center">
    <h1 class="mt-3">Hola {{ current_user()->nombre }} 🧑‍🚒👨‍🚒🚒</h1>
    <div class="col-md-3 text-center">
      <img src="{{ asset('img/bomberoslogo.png') }}" alt="">

    </div>
  </div>
</div>

@include('_nav')

@endsection

@push('javascript')
<script>



  localStorage.setItem('latitude', -33.51126534675838);
  localStorage.setItem('longitude', -70.75220954411635);
  // if (navigator.geolocation) {
  //   navigator.geolocation.getCurrentPosition(function(position) {
  //     var lat = position.coords.latitude;
  //     var lng = position.coords.longitude;

  //     // Guardar la posición en el localStorage
  //     localStorage.setItem('latitude', lat);
  //     localStorage.setItem('longitude', lng);

  //   }, function(error) {
  //     console.error('Error al obtener la posición:', error);
  //   });
  // } else {
  //   console.log("Geolocalización no soportada por el navegador.");
  // }
</script>
@endpush
