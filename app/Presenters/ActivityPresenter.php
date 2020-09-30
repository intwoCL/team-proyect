<?php

namespace App\Presenters;
use Storage;

class ActivityPresenter extends Presenter
{  
  public $states = array(
    1 => 'Edición',
    2 => 'Revisión',
    3 => 'Publicado'
  );

  private $colorState = array(
    1 => 'info',
    2 => 'warning',
    3 => 'success'
  );

  private $colorIcons = array(
    1 => 'fa-pen-square',
    2 => 'fa-pause-circle',
    3 => 'fa-check-circle'
  );

  private $folderImg = 'photo_activities';
  private $imgDefault = '/images/gallery.jpg';

  public function getState(){
    return $this->states[$this->model->status];
  }

  public function getColor(){
    return $this->colorState[$this->model->status];
  }

  public function getIcons(){
    return $this->colorIcons[$this->model->status];
  }

  public function getIconsHTML(){
    // return "<i class='fas fa-thumbs-up bg-success'></i>";
    return "<i class='fa-2x fa {$this->getIcons()} text-{$this->getColor()}' title='{$this->getState()}'></i>";    
  }

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