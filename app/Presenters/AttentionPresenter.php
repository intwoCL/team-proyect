<?php

namespace App\Presenters;

class AttentionPresenter extends Presenter
{
  public $states = array(
    1 => 'Pending',
    2 => 'Complete',
    3 => 'Canceled'
  );
  
  private $colorCss = array(
    1 => '#f39c12',
    2 => '#00a65a',
    3 => '#dd4b39'
  );

  private $colorState = array(
    1 => 'warning',
    2 => 'success',
    3 => 'danger'
  );

  public function getAttentionDate(){
		return date_format($this->getDateCreate(), 'd-m-Y h:m');
  }
  
  public function getAttentionDateTime(){
    return date_format($this->getDateCreate(), 'Y-m-d h:m');
  }

  public function getState(){
    return $this->states[$this->model->status];
  }

  public function getColor(){
    return $this->colorState[$this->model->status];
  }

  public function getColorCss(){
    return $this->colorCss[$this->model->status];
  }

  public function jsonCalendar(){
    return array(
      'title' => $this->model->user->present()->getFullName(),
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