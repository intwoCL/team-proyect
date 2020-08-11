<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

  use Notifiable;

  protected $hidden = [
    'password'
  ];


  /**
   * Get the user's full name.
   *
   * @return string
   */
  public function getFullName()
  {
    return "{$this->first_name} {$this->last_name}";
  }
}
