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
        7 => 'Reportado',
    ]
}
