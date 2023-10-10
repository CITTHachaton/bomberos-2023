<?php

namespace App\Http\Controllers;

use App\Models\Grifo;
use App\Models\Reporte;
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

  public function store(Request $request){

    try {
      $latitud = $request->input('latitud');
      $longitud = $request->input('longitud');
      $estado = $request->input('estado');
      $comentario = $request->input('comentario');

      $g = new Grifo();
      $g->latitud = $latitud;
      $g->longitud = $longitud;
      $g->estatus = $estado;
      $g->observaciones = $comentario;
      $g->save();


      return back()->with('success','se ha registrado');
    } catch (\Throwable $th) {
      return back()->with('danger','no se ha podido registrar');
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

  function updateDatos(Request $request) {
    $id_global = $request->input('id_global');
    $comentario = $request->input('comentario');
    $estado = $request->input('estado');

    $grifo = Grifo::findOrFail($id_global);
    $grifo->estatus = $estado;
    $grifo->update();

    if ($estado >= 3) {
      $r = new Reporte();
      $r->id_usuario = current_user()->id;
      $r->id_grifo = $id_global;
      $r->descripcion = $comentario;
      $r->estado = 1;
      $r->save();
    }

    return back()->with('success','Se ha actualizado correctamente');
  }


}
