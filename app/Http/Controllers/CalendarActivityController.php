<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calendar;
use App\Models\Activity;
use App\Models\CalendarActivity;

// horario
class CalendarActivityController extends Controller
{

  public function index($id){
    $c = Calendar::findOrFail($id);
    return view('admin.calendar.details.index',compact('c'));
  }

  public function edit($id){
    $c = Calendar::findOrFail($id);

    $calendarsActivities = CalendarActivity::where('calendar_id',$id)->get();
    // return $calendarsActivities;
    $calendars = array();
    foreach ($calendarsActivities as $ca) {
      $a = array(
        'daysOfWeek' => [ $ca->weekday ],
        'startTime' => $ca->worktime,
        'title' => $ca->activity->name,
        'backgroundColor' => 'green',
        // 'borderColor' => $color ,
        // 'url' => route('attention.control', $a->id),
      
      );
      array_push($calendars,$a);
    }
    return view('admin.calendar.details.edit',compact('c','calendars','days'));
  }

  public function create($id,$day){
    $c = Calendar::findOrFail($id);
    $activities = Activity::get();
    return view('admin.calendar.details.create',compact('c','day','activities'));
  }

  public function store($id,$day,Request $request){
    
    try {
      $ca  = new CalendarActivity();
      $ca->worktime = $request->input('worktime');
      $ca->activity_id = $request->input('activity_id');
      $ca->weekday = $day;
      $ca->calendar_id = $id;
      $ca->save();
      return redirect()->route('calendar.activity.edit',$id)->with('success',trans('alert.success'));
    } catch (\Throwable $th) {
      throw $th;
    }
    // $c = Calendar::findOrFail($id);
    // $activities = Activity::get();
    // return view('admin.calendar.details.create',compact('c','day','activities'));
  }
}
