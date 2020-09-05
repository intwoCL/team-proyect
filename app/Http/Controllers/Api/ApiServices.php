<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiServices extends Controller
{
  
  public function start($token){
    $API_TOKEN = env('API_TOKEN','2020');

    if($token==$API_TOKEN){
      return response()->json(["message"=>"ok"],200);
    }else{
      return response()->json(["message"=>"error"],404);
    }
  }
}
