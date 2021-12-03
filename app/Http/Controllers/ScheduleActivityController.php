<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\ScheduleActivity;
use App\Models\Activity;
use App\Models\ActivitySummaryReport;
use App\Services\ConvertDatetime;

class ScheduleActivityController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id)
  {
    $sch = Schedule::findOrFail($id);
    $activities = Activity::where('status',3)->get();
    return view('admin.schedule.details.create',compact('sch','activities'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $dias = $request->input('days');
      $worktime = $request->input('worktime');
      $activity_id = $request->input('activity_id');
      $times = $request->input('times');
      $schedule_id = $request->input('schedule_id');
      $calendar_id = Schedule::findOrFail($schedule_id)->calendar_id;

      foreach ($dias as $d) {
        $ca = new ScheduleActivity();
        $ca->worktime = $worktime;
        $ca->activity_id = $activity_id;
        $ca->schedule_id = $schedule_id;
        $ca->calendar_id = $calendar_id;
        $ca->weekday = $d;
        $ca->times = $times;
        $ca->save();
      }
      return redirect()->route('schedule.details.edit',$schedule_id)->with('success',trans('alert.success'));
      } catch (\Throwable $th) {
      throw $th;
      }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  public function delete(Request $request){
    try {
      $id = $request->input('id');
      $c = ScheduleActivity::findOrFail($id)->delete();
      return redirect()->back()->with('success',trans('alert.delete'));
    } catch (\Throwable $th) {
      return redirect()->back()->with('danger',trans('alert.danger'));
    }
  }

  // Calendar report
  public function report($id, $date){
    $dates = (new ConvertDatetime($date))->getStartEndWeek();
    $reports = ActivitySummaryReport::where('schedule_id',$id)
                                    ->whereBetween('finished_at', $dates)
                                    ->get();
    $sch = Schedule::findOrFail($id);
    $sch_activities = $sch->present()->getActivitiesTable();
    $numbers = [];

    foreach ($sch_activities as $keyX => $day_of_activitiesX) {
      $numbers[] = count($day_of_activitiesX);

      foreach ($day_of_activitiesX as $keyY => $valueY) {
        foreach ($reports as $r) {
          $n =  date('N',strtotime($r->finished_at));
          if ($n == $keyX+1 && $r->activity_id == $valueY->activity_id) {
            $sch_activities[$keyX][$keyY]['reporte'] = $r;
          }
        }
      }
    }

    $max = (!empty($numbers)) ? max($numbers) : 0;

    $resumen = [
      'e' => 0,
      'd' => 0,
      'f' => 0,
      'count' => 0,
      'e_p' => 0,
      'd_p' => 0,
      'f_p' => 0,
    ];

    foreach ($reports as $r) {
      $resumen['e'] = $resumen['e'] + $r->evaluation_score;
      $resumen['d'] = $resumen['d'] + $r->day_score;
      $resumen['f'] = $resumen['f'] + $r->frequency_score;
      $resumen['count']++;
    }

    if ($resumen['count'] > 0) {
      $resumen['e_p'] = $resumen['e'] > 0 ? round($resumen['e'] / $resumen['count']) : 0;
      $resumen['d_p'] = $resumen['d'] > 0 ? round($resumen['d'] / $resumen['count']) : 0;
      $resumen['f_p'] = $resumen['f'] > 0 ? round($resumen['f'] / $resumen['count']) : 0;
    }

    // return $resumen;

    return view('admin.schedule.details.report',compact('sch','sch_activities','max','reports','date','resumen'));
  }

  public function reportStore(Request $request, $id) {
    $date = date_format(date_create($request->input('fecha')),'Y-m-d');
    return redirect()->route('schedule.report',[$id, $date]);
  }


  public function time_for_week_day($day_name, $ref_time=null){
    $monday = strtotime(date('o-\WW',$ref_time));
    if(substr(strtoupper($day_name),0,3) === "MON")
      return $monday;
    else
      return strtotime("next $day_name",$monday);
  }
}
