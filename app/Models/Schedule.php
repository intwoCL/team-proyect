<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    public function activities(){
      return $this->belongsTo(Activity::class,'activity_id');
    }

    public function users(){
      return $this->belongsTo(User::class,'user_id');
    }
}
