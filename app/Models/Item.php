<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  private $folderImg = 'photo_items';

  public function itemContent(){
    return $this->belongsTo(Content::class,'content_id');
  }

  public function itemType(){
    return $this->belongsTo(Type::class,'type_id');
  }

  public function getPhoto(){
    return \Storage::url("$this->folderImg/$this->photo");
  }
}
