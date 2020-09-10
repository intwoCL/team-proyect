<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleActivity extends Model
{
  protected $table = 'schedules_activities';
  
  public function schedule(){
    return $this->belongsTo(Schedule::class,'schedule_id');
  }

  public function calendar(){
    return $this->belongsTo(Calendar::class,'calendar_id');
  }

  public function activity(){
    return $this->belongsTo(Activity::class,'activity_id');
  }

  public function activitiesSummaries(){
    return $this->hasMany(ActivitySummaries::class,'schedule_activity_id');
  }
}
