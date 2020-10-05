<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\ItemPresenter;
use App\Presenters\Data\ItemData;

use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
  use SoftDeletes;

  protected $table = 'items';

  public function content(){
    return $this->belongsTo(Content::class,'content_id');
  }
  
  public function present(){
    return new ItemPresenter($this);
  }
  
}
