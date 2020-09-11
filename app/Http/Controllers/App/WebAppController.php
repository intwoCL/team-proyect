<?php

namespace App\Http\Controllers\App;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Activity;
use App\Models\Attention;

class WebAppController extends Controller
{
  public function index(){
    $activities = Activity::get();
    return view('webapp.index',compact('activities'));
  }

  public function calendar($month,$year){
    $attentions = Attention::where('user_id',current_user()->id)->whereMonth('attention_date', $month)
    ->whereYear('attention_date', $year)->get();
    $date = date_format(Carbon::parse("$year-$month-01"),'Y-m');
    return view('webapp.calendar',compact('attentions','date'));
  }

  public function findCalendar(Request $request){
    $date = Carbon::parse($request->input('date'));
    $month = $date->month;
    $year = $date->year;
    return redirect()->route('app.calendar',[$month,$year]);
  }

  public function profile(){
    $user = current_user();
    return view('webapp.profile',compact('user'));
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
