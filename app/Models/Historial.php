<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function activity(){
        return $this->belongsTo(Activity::class,'activity_id');
	}
    
}
