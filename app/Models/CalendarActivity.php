<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarActivity extends Model
{
  protected $table = 'calendars_activities';

  public function calendar(){ 
    return $this->belongsTo(User::class,'calendar_id');
  }
  
  public function activity(){
    return $this->belongsTo(Activity::class,'activity_id');
  }

  public function scopeOrdenDay(){
    return $this->ordenBy('weekday','asc');
  }

  public function scopeOrdenTime(){
    return $this->ordenBy('weekday','asc');
  }
}
