
<?php

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
