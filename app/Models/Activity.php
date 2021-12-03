<?php

namespace App\Models;

use App\Presenters\ActivityPresenter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
  use SoftDeletes;

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

  public function hasFeedback(){
    return $this->evaluation_quiz_enabled || $this->day_quiz_enabled || $this->frequency_quiz_enabled;
  }

}
