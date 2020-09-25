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
      if($this->model->content == $this->imgDefault){
        return $this->imgDefault;
      }
      return \Storage::url("{$this->folderImg}/{$this->model->content}");
    } catch (\Throwable $th) {
      return $this->imgDefault;
    }
  }

  public function getAudio(){
    try {
      if(!empty($this->model->content)){
        return \Storage::url("{$this->folderAudio}/{$this->model->content}");
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