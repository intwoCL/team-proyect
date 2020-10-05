<?php

namespace App\Presenters;
use Storage;

class ContentPresenter extends Presenter
{  

  // private $folderImg = 'photo_contents';
  // private $imgDefault = '/images/gallery.jpg';

  // public function getPhoto(){
  //   try {
  //     if($this->model->photo == $this->imgDefault){
  //       return $this->imgDefault;
  //     }
  //     return \Storage::url("{$this->folderImg}/{$this->model->photo}");
  //   } catch (\Throwable $th) {
  //     return $this->imgDefault;
  //   }
  // }

  public function getQuiz(){
    // return ($this->model->quiz) ? '<i class="fas fa-question-circle"></i>' : '';
    return ($this->model->quiz) ? '<i class="fas fa-check"></i>' : '';
  }

}