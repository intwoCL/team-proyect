<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
  public function specialist(){
    return $this->belongsTo(User::class,'specialist_id');
  }
  
  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }
}
