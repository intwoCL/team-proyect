<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarActivity extends Model
{
  protected $table = 'activities';

  public function calendar(){ 
    return $this->belongsTo(User::class,'calendar_id');
  }
  
  public function activity(){
    return $this->hasMany(Activity::class,'activity_id');
  }
}
