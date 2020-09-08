<?php

namespace App\Presenters;

use App\Models\User;

class UserPresenter
{
  protected $user; 
  private $folderImg = 'photo_users';
  private $imgDefault = '/images/avatar.png';

  public function __construct(User $user){
    $this->user = $user;
  }


  public function getPhoto(){
    try {
      if($this->user->photo == $this->imgDefault){
        return $this->imgDefault;
      }
      return \Storage::url("$this->folderImg/$this->user->photo");
    } catch (\Throwable $th) {
      return $this->imgDefault;
    }
  }

}