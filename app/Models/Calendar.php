<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Presenters\CalendarPresenter;

class Calendar extends Model
{

  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function activities(){
    return $this->hasMany(CalendarActivity::class,'calendar_id')->orderBy('weekday','asc');
  }

  public function present(){
    return new CalendarPresenter($this);
  }
  
}
