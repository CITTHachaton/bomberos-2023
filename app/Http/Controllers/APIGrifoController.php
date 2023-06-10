<?php

namespace App\Http\Controllers;

use App\Models\Grifo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class APIGrifoController extends Controller
{
  public function indexJson() {
    $rutaArchivo = public_path('js/data.json');
    $contenidoArchivo = File::get($rutaArchivo);
    $datos = json_decode($contenidoArchivo, true);

    return $datos;
  }

  public function index() {
    $grifos = Grifo::get();

    return $grifos;
  }

}
