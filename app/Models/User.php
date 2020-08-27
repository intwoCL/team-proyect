<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

  use Notifiable;

  private $folderImg = 'photo_users';

  protected $guard = 'user';

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

  public function assignmentUsers(){
    return $this->hasMany(Assignment::class,'specialist_id');
  }

  public function changePassword($newPassword = ''){
    if(empty($newPassword)){
      $newPassword = helper_random_integer(6);
    }
    $encryPassword = hash('sha256', $newPassword);
    $this->password = $encryPassword;
    $this->update();
    return [$newPassword,$encryPassword]; 
  }

  public function getPhoto(){
    return \Storage::url("$this->folderImg/$this->photo");
  }
}
