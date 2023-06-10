<?php

namespace App\Http\Controllers;

use App\Models\Grifo;
use Illuminate\Http\Request;

class GrifoController extends Controller
{
  public function index() {
    $grifos = Grifo::get();

    return view('grifo.index', compact('grifos'));
  }

  function show($id){
    $g = Grifo::findOrFail($id);

    return view('grifo.show', compact('g'));
  }
}
