<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grifo extends Model
{
  use HasFactory;
  protected $table = 'grifo';

  const ESTADOS = [
    1 => ['Pendiente', 'dark'],
    2 => ['Disponible', 'success'],
    3 => ['Con problemas', 'warning'],
    4 => ['Abierto', 'primary' ],
    5 => ['Eliminado', 'danger' ]
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

    public function getStatus() {
      return self::ESTADOS[$this->estatus];
    }

    function getIcon() {
      switch ($this->estatus) {
        case 1:
          return asset('img/negro.svg');
        case 2:
          return asset('img/verde.svg');
        case 3:
          return asset('img/amarillo.svg');
        case 4:
          return asset('img/blue.svg');
        case 5:
          return asset('img/rojo.svg');
      }
    }

    public function get_rawr_info() {
      return [
        'id' => $this->id,
        'estado' => $this->getStatus()[0],
        'color' => $this->getStatus()[1],
        'latitud' => $this->latitud,
        'longitud' => $this->longitud,
        'img' => $this->getIcon()
      ];
    }

}
