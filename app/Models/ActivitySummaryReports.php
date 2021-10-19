<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitySummaryReports extends Model
{
    protected $table = 'activity_summaries_reports';

    const EVALUATION_SCORE = [
      100 => 'FELIZ',
      50  => 'MEDIO',
      10  => 'MAL',
      0   => 'NO',
    ];

    const DAY_SCORE = [
      100 => 'SOL',
      70  => 'MEDIO',
      40  => 'ATARDECER',
      10  => 'NOCHE',
      0   => 'NO',
    ];

    const FRECUENCY_SCORE = [
      100 => 'AZUL',
      70  => 'AMARILLO',
      40  => 'VERDE',
      10  => 'ROJO',
      0   => 'NO',
    ];

    public function user(){
      return $this->belongsTo(User::class,'user_id');
    }

    public function schedule(){
      return $this->belongsTo(Schedule::class,'schedule_id');
    }

    public function calendar(){
      return $this->belongsTo(Calendar::class,'calendar_id');
    }

    public function activity(){
      return $this->belongTo(Activity::class,'activity_id');
    }
}
