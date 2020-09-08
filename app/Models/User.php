<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Presenters\UserPresenter;

class User extends Authenticatable
{

  use Notifiable;

  protected $guard = 'user';

  protected $hidden = [
    'password'
  ];

  public function assignmentUsers(){
    return $this->hasMany(Assignment::class,'specialist_id');
  }

  public function getFullName(){
    return "{$this->first_name} {$this->last_name}";
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

  public function present(){
    return new UserPresenter($this);
  }

}
