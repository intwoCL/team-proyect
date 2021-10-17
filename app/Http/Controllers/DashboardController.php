<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activity;

class DashboardController extends Controller
{
  public function index(){
    $activities = Activity::where('status',3)->with('tagsCategories','tagsCategories.category')->orderBy('created_at','desc')->get();
    return view('app.dashboard',compact('activities'));
  }

  public function about(){
    return view('layouts.about');
  }
}
