<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  private $folderImg = 'photo_contents';

  public function activity(){
    return $this->belongsTo(Activity::class,'activity_id');
  }

  public function items(){
    return $this->hasMany(Item::class,'content_id')->orderBy('position','asc');;
  }

  public function getPhoto(){
    return \Storage::url("$this->folderImg/$this->photo");
  }
}
