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

/**
 * Random (string & num) por su longitud
 *
 * @param  int  $longitud
 * @return random text
 */
function helper_random_string_number($longitud) {
  $key = '';
  $pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $max = strlen($pattern)-1;
  for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
  return $key;
}

/**
* Random string por su longitud
*
* @param  int  $longitud
* @return random text
*/
function helper_random_string($longitud) {
  $key = '';
  $pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $max = strlen($pattern)-1;
  for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
  return $key;
}

/**
* Random integer por su longitud
*
* @param  int  $longitud
* @return random int
*/
function helper_random_integer($longitud) {
  $key = '';
  $pattern = '1234567890';
  $max = strlen($pattern)-1;
  for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
  return $key;
}

/**
* verify if gmail is active
*
* @return boolean status
*/
function  helper_integration_gmail(){
  return env('GOOGLE_ACTIVE', false);
}