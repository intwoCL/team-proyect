<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  protected $table = 'activities';
  private $folderImg = 'photo_activities';
  private $imgDefault = '/images/gallery.jpg';
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
}
