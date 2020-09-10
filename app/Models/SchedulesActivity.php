<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchedulesActivity extends Model
{
  protected $table = 'schedules_activities';

  public function users(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function content(){
    return $this->belongsTo(content::class,'content_id');
  }
}
