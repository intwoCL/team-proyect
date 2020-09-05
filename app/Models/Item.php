<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  private $folderImg = 'photo_items';
  private $imgDefault = '/images/gallery.jpg';

  public function itemContent(){
    return $this->belongsTo(Content::class,'content_id');
  }

  public function itemType(){
    return $this->belongsTo(Type::class,'type_id');
  }

  public function getPhoto(){
    try {
      if($this->photo == $this->imgDefault){
        return $this->photo;
      }
      return \Storage::url("$this->folderImg/$this->photo");
    } catch (\Throwable $th) {
      return $this->imgDefault;
    }
  }

  public function filter(){
    $diccionary = array('[:name]' => current_user()->getFullName() );

    $texto = "bienvenidos a [:name]";
    $result = str_replace('[:name]',current_user()->getFullName(),$this->content);
    return $result;
  }
}
