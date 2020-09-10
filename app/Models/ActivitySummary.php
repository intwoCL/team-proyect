<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitySummary extends Model
{
    protected $table = 'activity_summaries';

    public function schedule_activity(){
      return $this->belongsTo(ScheduleActivity::class,'schedule_activity_id');
    }

    public function contents(){
      return $this->belongsTo(Content::class,'content_id');
    }

    public function user(){
      return $this->belongsTo(User::class,'user_id');
    }
}
