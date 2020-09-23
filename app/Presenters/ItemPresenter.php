<?php

namespace App\Presenters;
use Storage;

use App\Presenters\Data\TypeData;


class ItemPresenter extends Presenter
{

  private $folderAudio = 'audio_items';
  private $folderImg = 'photo_items';
  private $imgDefault = '/images/gallery.jpg';

  public function getPhoto(){
    try {
      if($this->model->body == $this->imgDefault){
        return $this->imgDefault;
      }
      return \Storage::url("{$this->folderImg}/{$this->model->body}");
    } catch (\Throwable $th) {
      return $this->imgDefault;
    }
  }

  public function getSound(){
    try {
      if(empty($this->model->body)){
        return \Storage::url("{$this->folderAudio}/{$this->model->body}");
      }else{
        return '';
      }
    } catch (\Throwable $th) {
      return '';
    }
  }


  public function getType(){
    return (new TypeData())->types[$this->model->type];
  }
}