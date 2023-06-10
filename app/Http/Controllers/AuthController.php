<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{

  function login(Request $request) {
    try {

      $u = Usuario::where('correo', $request->input('usuario'))->where('password', $request->input('password'))->firstOrFail();

      Auth::guard('usuario')->loginUsingId($u->id);
      return redirect()->route('home');
    } catch (\Throwable $th) {
      return $th;
      return back()->with('danger','error ingrese nuevamente');
    }
  }

  function logout(){
    close_sessions();
    return redirect()->route('root');
  }
}
