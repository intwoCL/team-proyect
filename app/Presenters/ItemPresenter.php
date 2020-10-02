<?php

namespace App\Presenters;
use Storage;
use Carbon\Carbon;

use App\Presenters\Data\TypeData;


class ItemPresenter extends Presenter
{

  private $folderAudio = 'audio_items';
  private $folderImg = 'photo_items';
  private $imgDefault = '/images/gallery.jpg';

  private $typesIcons = array(
    1 => '<span class="badge badge-info"><i class="fas fa-link" title="URL"></i> Link </span>',
    2 => '<span class="badge badge-danger"><i class="fab fa-youtube" title="Video"></i> Video</span>',
    3 => '<span class="badge badge-success"><i class="fas fa-image" title="Imagen"></i> Imagen</span>',
    4 => '<span class="badge badge-primary"><i class="fas fa-volume-up" title="Audio"></i> Audio</span>',
    5 => '<span class="badge badge-secondary"><i class="fas fa-file-alt" title="Texto"></i> Texto</span>',
  );

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

  public function getText(){
    return $this->filter();
  }

  
  public function getIcons(){
    return $this->typesIcons[$this->model->type];
  }

  // $result = str_replace('[:name]',current_user()->present()->getFullName(),$this->body);
  public function filter(){
    $dt = Carbon::now();

    $diccionary = array(
      '[:name]' => current_user()->present()->getFullName(),
      '[:email]' => current_user()->email,
      '[:child]' => current_user()->child_name,
      '[:today]' => "$dt->day/$dt->month/$dt->year",
      '[:time]' =>  $dt->format('h:i'),
    );

    $text = $this->model->body;
    foreach ($diccionary as $key => $value) {
      $text = str_replace($key,$value,$text);
    }
    return $text;
  }
}