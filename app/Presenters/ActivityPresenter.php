<?php

namespace App\Presenters;
use Storage;

class ActivityPresenter extends Presenter
{
  
  public $states = ['edition','revision','published'];
  private $colorState = ['info','warning','success'];
  private $colorIcons = [' fa-pen-square','fa-pause-circle','fa-check-circle'];

  private $folderImg = 'photo_activities';
  private $imgDefault = '/images/gallery.jpg';

  public function getState(){
    return $this->states[$this->model->status-1];
  }

  public function getColor(){
    return $this->colorState[$this->model->status-1];
  }

  public function getIcons(){
    return $this->colorIcons[$this->model->status-1];
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