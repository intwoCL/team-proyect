<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\ItemPresenter;
use App\Presenters\Data\ItemData;

class Item extends Model
{
  protected $table = 'items';

  public function itemContent(){
    return $this->belongsTo(Content::class,'content_id');
  }
  
  public function present(){
    return new ItemPresenter($this);
  }

  public function filter(){
    $diccionary = array('[:name]' => current_user()->present()->getFullName() );

    $texto = "bienvenidos a [:name]";
    $result = str_replace('[:name]',current_user()->present()->getFullName(),$this->content);
    return $result;
  }
}
