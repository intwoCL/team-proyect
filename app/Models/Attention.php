<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
  public $states = ['Pending','Complete','Canceled'];
  private $colorCss = ['#f39c12','#00a65a','#dd4b39'];
  private $colorState = ['warning','success','danger'];

  public function specialist(){
    return $this->belongsTo(User::class,'specialist_id');
  }

  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function getAttentionDate(){
		return date_format(date_create($this->attention_date . " " . $this->attention_time), 'd-m-Y h:m');
  }
  
  public function getAttentionDateTime(){
    return date_format(date_create($this->attention_date . " " . $this->attention_time), 'Y-m-d h:m');
    // $this->attention_date . " " . $this->attention_time ,
  }

  public function getState(){
    return $this->states[$this->status-1];
  }

  public function getColor(){
    return $this->colorState[$this->status-1];
  }

  public function getColorCss(){
    return $this->colorCss[$this->status-1];
  }

  public function jsonCalendar(){
    return array(
      'title' => $this->user->present()->getFullName(),
      'start' => $this->getAttentionDateTime(),
      'backgroundColor' => $this->getColorCss(),
      'borderColor' => $this->getColorCss(),
      'url' => route('attention.control', $this->id),
    );
  }
}
