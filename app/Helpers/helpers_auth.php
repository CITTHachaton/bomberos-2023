
<?php

use App\Models\Inf\Usuario;

/**
 * session user
 *
 * @return only true
 */
function current_user() {
  return auth('usuario')->user();
}

function close_sessions() {
  $perfiles = ['usuario'];
  foreach ($perfiles as $perfil) {
    if(Auth::guard($perfil)->check()) {
      Auth::guard($perfil)->logout();
    }
  }

  // if(Auth::guard('inscripcion')->check()){
  //   Auth::guard('inscripcion')->logout();
  // }
  // session()->flush();
  // session()->forget('gp_config');
  return true;
}
