<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
  public $states = ['Pending','Complete','Canceled'];

  public function specialist(){
    return $this->belongsTo(User::class,'specialist_id');
  }
  
  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function getAttentionDate(){
		return date_format(date_create($this->attention_date . " " . $this->attention_time), 'd-m-Y h:m');
  }

  public function getState(){
    return $this->states[$this->status-1];
  }
}
