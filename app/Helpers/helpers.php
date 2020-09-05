<?php 

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

function helper_days() {
  $days = array();
  for ($i=1; $i < 8; $i++) {
    array_push($days,trans("t.days.$i"));
  }
  return $days;
}


