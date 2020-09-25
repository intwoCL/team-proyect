<?php

namespace App\Presenters;

class CalendarPresenter extends Presenter
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

  public function getState(){
    return $this->states[$this->model->status];
  }

  public function getColor(){
    return $this->colorState[$this->model->status];
  }
  
  public function getActivitiesTable(){
    $activities = $this->model->activities;
    $calendars = [];
    for ($i=0; $i < count($activities) ; $i++) { 
      switch ($activities[$i]->weekday) {
        case 1:
          $calendars[0][] = $activities[$i];
          break;
        case 2:
          $calendars[1][] = $activities[$i];
          break;
        case 3:
          $calendars[2][] = $activities[$i];
          break;
        case 4:
          $calendars[3][] = $activities[$i];
          break;
        case 5:
          $calendars[4][] = $activities[$i];
          break;
        case 6:
          $calendars[5][] = $activities[$i];
          break;
        case 7:
          $calendars[6][] = $activities[$i];
          break;
      }
    }
    return $calendars;
  }


}