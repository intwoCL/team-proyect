<?php

namespace App\Presenters;

class AttentionPresenter extends Presenter
{
  
  public $states = ['Pending','Complete','Canceled'];
  private $colorCss = ['#f39c12','#00a65a','#dd4b39'];
  private $colorState = ['warning','success','danger'];

  public function getAttentionDate(){
		return date_format($this->getDateCreate(), 'd-m-Y h:m');
  }
  
  public function getAttentionDateTime(){
    return date_format($this->getDateCreate(), 'Y-m-d h:m');
  }

  public function getState(){
    return $this->states[$this->model->status-1];
  }

  public function getColor(){
    return $this->colorState[$this->model->status-1];
  }

  public function getColorCss(){
    return $this->colorCss[$this->model->status-1];
  }

  public function jsonCalendar(){
    return array(
      'title' => $this->user->present()->getFullName(),
      'start' => $this->getAttentionDateTime(),
      'backgroundColor' => $this->getColorCss(),
      'borderColor' => $this->getColorCss(),
      'url' => route('attention.control', $this->model->id),
    );
  }
  
  private function getDateCreate(){
    return date_create($this->model->attention_date . " " . $this->model->attention_time);
  }
}