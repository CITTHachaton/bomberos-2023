<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
  use HasFactory;
  protected $table = 'usuario';
  protected $guard = 'usuario';

  protected $fillable = [
    'nombre',
    'correo',
    'password',
    'cargo'
  ];
}
