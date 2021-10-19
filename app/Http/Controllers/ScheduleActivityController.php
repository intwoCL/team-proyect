<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\ScheduleActivity;
use App\Models\Activity;
use App\Models\ActivitySummary;
use App\Models\ActivitySummaryReports;
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
  public function report($id){
    // $sch = Schedule::findOrFail($id);
    // return $sch;

    // $reportes =  ActivitySummaryReports::where('schedule_id',$sch->id)->get();

    // return $reportes;
    // // $summary = ActivitySummary::where()

    // // foreach ($sch->schedulesActivities as $schedule_activity) {
    // //   foreach ($schedule_activity->activitiesSummaries as $summary) {
    // //     echo $summary->id;
    // //     echo "<br>";
    // //   }
    // //   // echo $schActivity->id;
    // //   echo "<br>";
    // // }


    // date('Y-m-d')
    // return date('N',strtotime(date('Y-m-d')));

    $date = (new ConvertDatetime(date('Y-m-d')))->getStartEnd();

    $reports = ActivitySummaryReports::where('schedule_id',$id)
                                    ->whereBetween('finished_at', $date)
                                    ->get();

    // return $reports;

    $sch = Schedule::findOrFail($id);
    $sch_activities = $sch->present()->getActivitiesTable();
    $numbers = [];

    // return $sch_activities;
    foreach ($sch_activities as $keyX => $day_of_activitiesX) {
      $numbers[] = count($day_of_activitiesX);

      foreach ($day_of_activitiesX as $keyY => $valueY) {
        foreach ($reports as $r) {
          $n =  date('N',strtotime($r->finished_at));
          if ($n == $keyX && $r->activity_id == $valueY->activity_id) {
            // $sch_activities[$key]['reporte'][] = $r;
            // return $r;
            // $day_of_activities[$keyX]['reportes'] = $r;

            $sch_activities[$keyX][$keyY]['reporte'] = $r;

          }

        }
      }

    }
    $max = (!empty($numbers)) ? max($numbers) : 0;


    // return $sch_activities;
    return view('admin.schedule.details.report',compact('sch','sch_activities','max','reports'));
    // return compact('sch','sch_activities','max');
  }

  public function reportStore(Request $request, $id) {
    return $request;
  }
}
