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

  public function edit($id){
    try {
        $g = Grifo::findOrFail($id);
        return view('grifo.edit', compact('g'));
    } catch (\Exception $e) {
        return redirect()->route('grifos.index')->with('error', 'El grifo no existe.');
    }
  }

  public function update(Request $request, $id){
    try {
        $g = Grifo::findOrFail($id);

        $g->estatus = $request->input('estado');
        $g->update();

        return redirect()->route('grifos.index')->with('success', 'Estado del grifo actualizado correctamente.');
    } catch (\Exception $e) {
        return redirect()->route('grifos.index')->with('error', 'El grifo no existe.');
    }
  }


}
