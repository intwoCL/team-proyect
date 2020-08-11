
<?php
/**
 * close all sessions actives
 *
 * @return only true
 */
function close_sessions(){
  if(Auth::guard('user')->check()){
      Auth::guard('user')->logout();
  }
  // session()->forget('permisos');
  return true;
}

/**
 * session user
 *
 * @return only true
 */
function current_user(){
  return auth('user')->user();
}

function is_admin(){
  return auth('user')->user()->admin;
}

function is_specialist(){
  return auth('user')->user()->specialist;
}
