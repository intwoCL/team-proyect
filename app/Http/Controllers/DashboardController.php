<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activity;

class DashboardController extends Controller
{
  public function index()
  {
    $activities = Activity::where('status',3)->get();
    return view('app.dashboard',compact('activities'));
  }
}
