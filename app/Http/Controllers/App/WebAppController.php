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
use App\Models\ActivitySummaryReport;

class WebAppController extends Controller
{

  public function index(){
    $schedule = Schedule::where('user_id',current_user()->id)->with(['schedulesActivities','schedulesActivities.activity'])->where('status',2)->first();
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
      $scheduleActivity = ScheduleActivity::with(['activity','activity.contents'])->findOrFail($id);

      // cambiar a estados: disponible, no corresponde al dia, respondido

      //query si hay ActivitySummaryReport hoy (Flag)
      $hoy = ActivitySummaryReport::where('finished_at',Carbon::now()->toDateString())->where('activity_id',$scheduleActivity->activity_id)->first();
      $feedbackEnabled = empty($hoy) && $scheduleActivity->weekday==Carbon::now()->dayOfWeekIso;

      // return $scheduleActivity;
      // es mi horario, esta activado y es la id correcta
      $schedule = Schedule::where('user_id',current_user()->id)->where('status',2)->findOrFail($scheduleActivity->schedule_id);
      $activity = $scheduleActivity->activity;
      $feedbackEnabled = $feedbackEnabled && $activity->hasFeedback();

      return view('webapp.activity',compact('scheduleActivity','activity','schedule','feedbackEnabled'));
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
    $attentions = Attention::where('user_id',current_user()->id)->with(['specialist'])->whereMonth('attention_date', $month)->whereYear('attention_date', $year)->get();
    $date = date_format(Carbon::parse("$year-$month-01"),'Y-m');
    return view('webapp.calendar',compact('attentions','date'));
  }

  public function findCalendar(Request $request){
    $date = Carbon::parse($request->input('date'));
    $month = $date->month;
    $year = $date->year;
    return redirect()->route('app.calendar',[$month,$year]);
  }

  public function sendDayQuiz(Request $request, $sa_id){
    try {
      $sa = ScheduleActivity::findOrFail($sa_id);

      $asr = new ActivitySummaryReport();
      $asr->user_id = current_user()->id;
      $asr->schedule_id = $sa->schedule_id;
      $asr->calendar_id = $sa->calendar_id;
      $asr->activity_id = $sa->activity_id;
      $asr->evaluation_score = $request->input('evaluacion') ?? 0;
      $asr->day_score = $request->input('momento') ?? 0;
      $asr->frequency_score = $request->input('frecuencia') ?? 0;
      $asr->finished_at = Carbon::now()->toDateString();
      $asr->save();

      return back()->with('success','Evaluacion enviada exitosamente');

    } catch (\Throwable $th) {
      return $th;
      //back()->with('danger','Error intente nuevamente');
    }
  }


}
