<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\ItemPresenter;
use App\Presenters\Data\ItemData;

class Item extends Model
{
  protected $table = 'items';

  protected $casts = [
    'data' => 'array'
  ];

  protected $fillable = [
    'data'
  ];


  public function setMetaAttribute($value)
  {
      $list = [];

      foreach ($value as $array_item) {
          if (!is_null($array_item['key'])) {
              $list[] = $array_item;
          }
      }

      $this->attributes['list'] = json_encode($list);
  }

  public function itemContent(){
    return $this->belongsTo(Content::class,'content_id');
  }
  
  public function present(){
    return new ItemPresenter($this);
  }

  // public function getData(){
  //   $this->attributes['data'];
  // }

  public function setSound($value){
    $this->data['sound'] = $value;
  }

  public function getSound(){
    return $this->data['sound'];
  }

  public function setUrl($value){
    $d = $this->data;
    $d['url'] = $value;
    $this->data = $d;
  }
  
  public function getUrl(){
    return $this->data['url'];
  }

  public function setVideo($value){
    $this->data['video'] = $value;
  }
  
  public function getVideo(){
    return $this->data['video'];
  }

  public function setPhoto($value){
    $this->data['photo'] = $value;
  }

  public function getPhoto(){
    return $this->data['photo'];
  }

  public function filter(){
    $diccionary = array('[:name]' => current_user()->present()->getFullName() );

    $texto = "bienvenidos a [:name]";
    $result = str_replace('[:name]',current_user()->present()->getFullName(),$this->content);
    return $result;
  }
  
}
