<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    return view('index');
  }

  public function mapa() {
    return view('mapa');
  }

  public function grifos() {
    return view('grifos');
  }
}
