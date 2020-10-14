<?php

namespace App\Models;

use App\Presenters\ContentPresenter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
  use SoftDeletes;

  private $folderImg = 'photo_contents';

  public function activity(){
    return $this->belongsTo(Activity::class,'activity_id');
  }

  public function items(){
    return $this->hasMany(Item::class,'content_id')->orderBy('position','asc');
  }

  public function present(){
    return new ContentPresenter($this);
  }
}
