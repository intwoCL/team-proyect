<?php

namespace App\Presenters;

class ActivityPresenter extends Presenter
{
  private $folderImg = 'photo_activities';
  private $imgDefault = '/images/gallery.jpg';

  public function getPhoto(){
    try {
      if($this->model->photo == $this->imgDefault){
        return $this->imgDefault;
      }
      return \Storage::url("{$this->folderImg}/{$this->model->photo}");
    } catch (\Throwable $th) {
      return $this->imgDefault;
    }
  }

  public function getCodeName(){
    return "{$this->model->id} {$this->model->name}";
  }

}