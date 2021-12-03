<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitySummaryReport extends Model
{
    protected $table = 'activity_summary_reports';

    const EVALUATION_SCORE = [
      100 => 'FELIZ',
      50  => 'MEDIO',
      10  => 'MAL',
      0   => 'NO',
    ];

    const EVALUATION_SCORE_NUMBER = [
      'FELIZ' => 100,
      'MEDIO' => 50,
      'MAL' => 10,
      'NO' => 0
    ];

    const DAY_SCORE = [
      100 => 'AMANECER',
      70  => 'TARDE',
      40  => 'ATARDECER',
      10  => 'NOCHE',
      0   => 'NO',
    ];


    const DAY_SCORE_NUMBER = [
      'AMANECER' => 100,
      'TARDE' => 70,
      'ATARDECER' => 40,
      'NOCHE' => 10,
      'NO' => 0
    ];

    const FRECUENCY_SCORE = [
      100 => 'AZUL',
      70  => 'AMARILLO',
      40  => 'VERDE',
      10  => 'ROJO',
      0   => 'NO',
    ];

    const FRECUENCY_SCORE_NUMBER = [
      'AZUL' => 100,
      'AMARILLO' => 70,
      'VERDE' => 40,
      'ROJO' => 10,
      'NO' => 0
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
