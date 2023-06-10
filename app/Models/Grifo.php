<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grifo extends Model
{
  use HasFactory;
  protected $table = 'grifo';

  const ESTADOS = [
    1 => 'Pendiente',
    2 => 'Disponible',
    3 => 'Con problemas',
    4 => 'En reparacion',
    5 => 'Deshabilitado',
    6 => 'Eliminado',
    7 => 'Reportado'
  ];

  protected $fillable = [
    'nombre',
    'anio',
    'c_sr_ap',
    'diam_grifo',
    'editor',
    'estado',
    'fecha_arreglo',
    'fecha_creacion',
    'fecha_edicion',
    'field_1',
    'observaciones',
    'owner',
    'shape',
    'ubicacion',
    'latitud',
    'longitud',
  ];

    // Mutador para convertir "<Nulo>" en valores nulos
    public function setNullableFields($value)
    {
        return ($value === "<Nulo>") ? null : $value;
    }

    // Mutadores para los campos que deseas validar
    public function setFechaArregloAttribute($value)
    {
        $this->attributes['fecha_arreglo'] = $this->setNullableFields($value);
    }

    public function setObservacionesAttribute($value)
    {
        $this->attributes['observaciones'] = $this->setNullableFields($value);
    }

}
