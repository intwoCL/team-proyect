<?php

namespace App\Http\Controllers\App;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Activity;
use App\Models\Content;
use App\Models\Item;
use App\Models\Attention;
use App\Models\Schedule;
use App\Models\ScheduleActivity;
use App\Models\ActivitySummary;

class WebAppController extends Controller
{

  public function index(){
    $schedule = Schedule::where('user_id',current_user()->id)->where('status',2)->first();
    if(!empty($schedule)){
      $Schedule_days = $schedule->present()->getActivitiesTable();
      ksort($Schedule_days);
    }else{
      $schedule = null;
      $Schedule_days = [];
    }
    return view('webapp.index',compact('schedule','Schedule_days'));
  }

  public function activity($id){
    try {
      //comprueba el curso
      $scheduleActivity = ScheduleActivity::findOrFail($id);
      // es mi horario, esta activado y es la id correcta
      $schedule = Schedule::where('user_id',current_user()->id)->where('status',2)->findOrFail($scheduleActivity->schedule_id);
      $activity = $scheduleActivity->activity;
      return view('webapp.activity',compact('scheduleActivity','activity','schedule'));
    } catch (\Throwable $th) {
      return $th;
    }
  }

  // id_sa = ScheduleActivity
  public function content($sa_id,$content_id){
    try {
      //comprueba el curso
      $scheduleActivity = ScheduleActivity::findOrFail($sa_id);
      // es mi horario, esta activado y es la id correcta
      $schedule = Schedule::where('user_id',current_user()->id)->where('status',2)->findOrFail($scheduleActivity->schedule_id);
      $content = Content::findOrFail($content_id);
      $back = route('app.activity',[$sa_id]);

      // register activity
      $summary = new ActivitySummary();
      $summary->content_id = $content_id;
      $summary->schedule_activity_id = $scheduleActivity->id;
      $summary->user_id = current_user()->id;
      $summary->save();

      return view('webapp.content',compact('scheduleActivity','content','back','summary'));
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function profile(){
    $user = current_user();
    return view('webapp.profile',compact('user'));
  }

  public function calendar($month,$year){
    $attentions = Attention::where('user_id',current_user()->id)->whereMonth('attention_date', $month)->whereYear('attention_date', $year)->get();
    $date = date_format(Carbon::parse("$year-$month-01"),'Y-m');
    return view('webapp.calendar',compact('attentions','date'));
  }

  public function findCalendar(Request $request){
    $date = Carbon::parse($request->input('date'));
    $month = $date->month;
    $year = $date->year;
    return redirect()->route('app.calendar',[$month,$year]);
  }


}
