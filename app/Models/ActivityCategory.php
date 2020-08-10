<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
  public function activity(){
    return $this->belongsTo(Activity::class,'activity_id');
  }
  
  public function category(){
    return $this->hasMany(Category::class,'category_id');
  }
}
