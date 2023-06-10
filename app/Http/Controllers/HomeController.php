<?php

namespace App\Http\Controllers;

use App\Models\Grifo;
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
    return view('mapa');
  }
}
