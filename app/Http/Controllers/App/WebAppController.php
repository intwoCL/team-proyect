<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Activity;

class WebAppController extends Controller
{
  public function index(){
    $activities = Activity::get();
    return view('webapp.index',compact('activities'));
  }

  public function activity($id){
    $activity = Activity::findOrFail($id);
    return view('webapp.activity',compact('activity'));
  }

  public function store(Request $request){
    return $request;
  }

  public function item(){
    return view('webapp.items');
  }

  // public function index(){
  //   return view('webapp.welcome');
  // }


}
