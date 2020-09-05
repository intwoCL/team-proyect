<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{

  protected $table = 'activities_categories';

  public function activity(){
    return $this->belongsTo(Activity::class,'activity_id');
  }
  public function category(){
    return $this->belongsTo(Category::class,'category_id');
  }
}
