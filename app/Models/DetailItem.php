<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailItem extends Model
{

  protected $table = 'details_items';

  public function item(){
    return $this->belongsTo(Item::class,'item_id');
  }
  
  public function type(){
    return $this->belongsTo(Type::class,'type_id');
  }
}
