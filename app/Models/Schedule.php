<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Presenters\SchedulePresenter;

class Schedule extends Model
{

  public function calendar(){
    return $this->belongsTo(Calendar::class, 'calendar_id');
  }

  public function specialist(){
    return $this->belongsTo(User::class, 'specialist_id');
  }

  public function user(){
    return $this->belongsTo(User::class, 'user_id');
  }

  public function schedulesActivities(){
    return $this->hasMany(ScheduleActivity::class, 'schedule_id');
  }

  public function present(){
    return new SchedulePresenter($this);
  }
}
