<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  public function itemContent(){
    return $this->belongsTo(Content::class,'content_id');
  }

  public function itemType(){
    return $this->belongsTo(Type::class,'type_id');
  }
}
