<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitySummaryReports extends Model
{
    protected $table = 'activity_summary_reports';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
      }

    public function schedule(){
      return $this->belongsTo(Schedule::class,'schedule_id');
    }

    public function calendar(){
      return $this->belongsTo(Calendar::class,'calendar_id');
    }

    public function activity()
    {
      return $this->belongTo(Activity::class,'activity_id')
    }


}
