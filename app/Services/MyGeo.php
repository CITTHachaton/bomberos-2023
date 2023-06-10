<?php

namespace App\Services;

class MyGeo
{

  static function location() {

      // Obtener la dirección IP del cliente
      $ip = $_SERVER['REMOTE_ADDR'];
      $key = '08e8cf5939264ac4a1f6387ae388c6ee';

      // Llamar a la API de IP Geolocation
      $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$key."&ip=" . $ip;

      // Realizar la solicitud HTTP a la API
      $response = file_get_contents($url);

      // Decodificar la respuesta JSON
      $data = json_decode($response);

      // Obtener la información de geolocalización
      $country = $data->country_name;
      $region = $data->state_prov;
      $city = $data->city;
      $latitude = $data->latitude;
      $longitude = $data->longitude;

      return [
        'pais' => $country,
        'region' => $region,
        'ciudad' => $city,
        'latitud' => $latitude,
        'longitud' => $longitude
      ];
  }
}

