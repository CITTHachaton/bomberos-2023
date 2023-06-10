<?php

namespace App\Services;

use App\Models\Grifo;
use Illuminate\Support\Facades\File;

class GrifoJsonToClass
{

  public function import() {
    $rutaArchivo = public_path('js/data.json');
    $contenidoArchivo = File::get($rutaArchivo);
    $data = json_decode($contenidoArchivo, true);


    // Iterar sobre los features del archivo GeoJSON y guardar los datos en la base de datos
    foreach ($data['features'] as $feature) {
        $properties = $feature['properties'];
        $geometry = $feature['geometry'];

        Grifo::create([
            'nombre' => $this->filter($properties['Name']),
            'anio' => $this->filter($properties['ANIO']),
            'c_sr_ap' => $this->filter($properties['C_SR_AP']),
            'diam_grifo' => $this->filter($properties['DIAM_GRIFO']),
            'editor' => $this->filter($properties['EDITOR']),
            'estado' => $this->filter($properties['ESTADO']),
            'fecha_arreglo' => $this->filter($properties['FECHA_ARREGLO']),
            'fecha_creacion' => $this->filter($properties['FECHA_CREACION']),
            'fecha_edicion' => $this->filter($properties['FECHA_EDICION']),
            'field_1' => $this->filter($properties['Field_1']),
            'observaciones' => $this->filter($properties['OBSERVACIONES']),
            'owner' => $this->filter($properties['OWNER']),
            'shape' => $this->filter($properties['SHAPE']),
            'ubicacion' => $this->filter($properties['UBICACION']),
            'latitud' => $this->filter($geometry['coordinates'][1]),
            'longitud' => $this->filter($geometry['coordinates'][0]),
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
