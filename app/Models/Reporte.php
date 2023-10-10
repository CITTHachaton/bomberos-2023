<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
  use HasFactory;
  protected $table = 'reporte';

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
	}

  public function grifo(){
    return $this->belongsTo(Grifo::class,'id_grifo');
	}
}
