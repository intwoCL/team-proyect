<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitySummary extends Model
{
    protected $table = 'activity_summaries';

    public function schedude(){
      return $this->belongsTo(Schedude::class,'schedude_id');
    }

    public function contents(){
      return $this->belongsTo(Contents::class,'content_id');
    }
}
