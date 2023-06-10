<?php

namespace App\Http\Controllers;

use App\Models\Grifo;
use App\Services\MyGeo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    return view('index');
  }

  public function login() {
    return view('login');
  }

  public function home() {
    return view('home');
  }

  public function mapa() {
    $grifos_raw = [];

    $grifos = Grifo::get();

    foreach ($grifos as $g) {
      array_push($grifos_raw, $g->get_rawr_info());
    }

    // return $grifos_raw;

    return view('mapa', compact('grifos_raw'));
  }

  public function mapa_general() {
    $grifos_raw = [];

    $grifos = Grifo::get();

    foreach ($grifos as $g) {
      array_push($grifos_raw, $g->get_rawr_info());
    }

    // return $grifos_raw;

    return view('mapa', compact('grifos_raw'));
  }
}
