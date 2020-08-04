<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table = 'activities';

    public function contents(){
        return $this->hasMany(Content::class,'activity_id');
	}
}
