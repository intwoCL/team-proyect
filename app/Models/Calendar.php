<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
  public $text_status = ['desarrollo','en revisión','publicado'];

  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }
  
}
