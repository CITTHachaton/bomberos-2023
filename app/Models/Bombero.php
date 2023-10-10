<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bombero extends Model
{
    use HasFactory;
    protected $table = 'bombero';

    protected $fillable = [
      'nombre',
      'latitud',
      'longitud',
    ];

    public function get_rawr_info() {
      return [
        'id' => $this->id,
        'latitud' => $this->latitud,
        'longitud' => $this->longitud,
        'img' => asset('img/carro.png'),
        'direccion' => $this->nombre
      ];
    }
}
