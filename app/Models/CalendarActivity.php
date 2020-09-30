<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarActivity extends Model
{
  protected $table = 'calendars_activities';

  public function calendar(){ 
    return $this->belongsTo(Calendar::class,'calendar_id');
  }
  
  public function activity(){
    return $this->belongsTo(Activity::class,'activity_id');
  }

  // public function scopeOrdenDay($query){
  //   return $query->ordenBy('weekday','asc');
  // }

  // public function scopeOrdenTime(){
  //   return $this->ordenBy('worktime','asc');
  // }

  public function getDayWords(){
    return helper_days()[$this->weekday-1];
  }

  public function getCodeNameTime(){
    return "|".$this->times." times| " . $this->activity->present()->getCodeName()." ".$this->worktime;
  }
  public function getCodeNameTimeHTML(){
    return $this->activity->present()->getCodeName() . "<span class='ml-4 badge badge-primary'>{$this->times}</span>";
  }
}
