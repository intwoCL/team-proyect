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
      if($this->model->image == $this->imgDefault){
        return $this->imgDefault;
      }
      return \Storage::url("{$this->folderImg}/{$this->model->image}");
    } catch (\Throwable $th) {
      return $this->imgDefault;
    }
  }

  public function getAudio(){
    try {
      if(!empty($this->model->data)){
        return \Storage::url("{$this->folderAudio}/{$this->model->data}");
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

  public function filter(){
    $diccionary = array(
      '[:name]' => current_user()->present()->getFullName()
    );

    // $texto = "bienvenidos a [:name]";
    $result = str_replace('[:name]',current_user()->present()->getFullName(),$this->body);
    return $result;
  }
}