<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  public function content(){
    return $this->belongsTo(Content::class,'content_id');
  }
  
  public function types(){
    return $this->hasMany(DetailItem::class,'item_id');
  }
}
