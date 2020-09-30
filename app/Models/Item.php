<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\ItemPresenter;
use App\Presenters\Data\ItemData;

class Item extends Model
{
  protected $table = 'items';
  // protected $casts = ['data' => 'array'];
  // protected $fillable = ['data'];

  // public function setMetaAttribute($value){
  //   $list = [];
  //   foreach ($value as $array_item) {
  //     if (!is_null($array_item['key'])) {
  //       $list[] = $array_item;
  //     }
  //   }
  //   $this->attributes['data'] = json_encode($list);
  // }

  public function content(){
    return $this->belongsTo(Content::class,'content_id');
  }
  
  public function present(){
    return new ItemPresenter($this);
  }

  // public function getData(){
  //   $this->attributes['data'];
  // }

  // public function setSound($value){
  //   $options = $this->data;
  //   $options['url'] = $value;
  //   $this->data = $options;
  // }

  // public function getSound(){
  //   $options = $this->data;
  //   return $options['sound'];
  // }

  // public function setUrl($value){
  //   $d = $this->data;
  //   $d['url'] = $value;
  //   $this->data = $d;
  // }
  
  // public function getUrl(){
  //   return $this->data['url'];
  // }

  // public function setVideo($value){
  //   $d = $this->data;
  //   $d['video'] = $value;
  //   $this->data = $d;
  // }
  
  // public function getVideo(){
  //   return $this->data['video'];
  // }

  // public function setPhoto($value){
  //   $d = $this->data;
  //   $d['video'] = $value;
  //   $this->data = $d;
  // }

  // public function getPhoto(){
  //   return $this->data['photo'];
  // }


  
}
