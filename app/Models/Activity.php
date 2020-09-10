<?php

namespace App\Models;

use App\Presenters\ActivityPresenter;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  protected $table = 'activities';

  public $selected = false;

  public function contents(){
    return $this->hasMany(Content::class,'activity_id')->orderBy('position','asc');
  }

  public function scale(){
    return $this->hasMany(Scale::class,'scale_id');
  }

  public function tagsCategories(){
    return $this->hasMany(ActivityCategory::class,'activity_id');
  }

  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function present(){
    return new ActivityPresenter($this);
  }

}
