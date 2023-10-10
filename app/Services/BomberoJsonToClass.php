<?php

namespace App\Services;

use App\Models\Bombero;
use App\Models\Grifo;
use Illuminate\Support\Facades\File;

class BomberoJsonToClass
{

  public function import() {
    $rutaArchivo = public_path('js/bomberos.json');
    $contenidoArchivo = File::get($rutaArchivo);
    $data = json_decode($contenidoArchivo, true);


    // Iterar sobre los features del archivo GeoJSON y guardar los datos en la base de datos
    foreach ($data['companias'] as $compania) {
      Bombero::create([
          'nombre' => $compania['nombre'],
          'latitud' => $compania['coordenadas']['latitud'],
          'longitud' => $compania['coordenadas']['longitud'],
          'zoom' => $compania['coordenadas']['zoom'],
      ]);
    }
  }

  private function filter($name) {
    if ($name == '&lt;Nulo&gt;') {
      return null;
    }

    return $name;
  }
}
