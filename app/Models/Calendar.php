<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{

  public $states = ['edition','revision','published'];

  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function activities(){
    return $this->hasMany(CalendarActivity::class,'calendar_id');
  }

  public function getState(){
    return $this->states[$this->status-1];
  }
  
}
