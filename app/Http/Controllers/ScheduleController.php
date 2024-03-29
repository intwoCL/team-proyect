<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Calendar;
use App\Models\Activity;
use App\Models\CalendarActivity;
use App\Models\Schedule;
use App\Models\ScheduleActivity;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $schedules = Schedule::where('user_id',$id)->get();
      return view('admin.schedule.index', compact('schedules','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        //$activity = Activity::FindOrFail($activity_id);
        $user = User::FindOrFail($user_id);
        $calendars = Calendar::where('status',3)->get();
        return view('admin.schedule.create',compact('user','calendars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$user_id)
    {
        try {
            $sch = new Schedule();
            $cal = Calendar::FindOrFail($request->input('id'));
            $sch->calendar_id = $cal->id;
            $sch->user_id = $user_id;
            $sch->specialist_id = current_user()->id;
            $sch->name = $cal->name;
            $sch->objective = $cal->objective;
            $sch->save();

            // Crear los Schedules Activities
            foreach ($cal->activities as $ca) {
                $sa = new ScheduleActivity();
                $sa->schedule_id = $sch->id;
                $sa->calendar_id = $cal->id;
                $sa->activity_id = $ca->activity_id;
                $sa->weekday = $ca->weekday;
                $sa->worktime = $ca->worktime;
                $sa->times = $ca->times;
                $sa->save();
            }
            return redirect()->route('schedule.index',$user_id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger',trans('alert.danger'));
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
        $sch = Schedule::findOrFail($id);
        $sch_activities = $sch->present()->getActivitiesTable();
        $numbers = [];
        foreach ($sch_activities as $day_of_activities) {
          $numbers[] = count($day_of_activities);
        }
        $max = (!empty($numbers)) ? max($numbers) : 0;
        return view('admin.schedule.details.index',compact('sch','sch_activities','max'));
        // return compact('sch','sch_activities','max');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sch = Schedule::findOrFail($id);
        //return $sch->schedulesActivities;
        return view('admin.schedule.edit',compact('sch'));
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
      try{
        $s = Schedule::findOrFail($id);
        $s->name = $request->input('name');
        $s->objective = $request->input('objective');
        $s->status = $request->input('status');
        $s->comment = !empty($request->input('comment')) ? $request->input('comment') : '' ;

        $s->update();
        return redirect()->back()->with('success',trans('alert.update'));
      } catch(\Throwable $th){
        return $th;
        return redirect()->back()->with('danger',trans('alert.danger'));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function details($id)
    {
        $sch = Schedule::findOrFail($id);

        $sch_activities = ScheduleActivity::where('schedule_id',$id)->get();
        $schedules = array();
        foreach ($sch_activities as $sa) {
          $a = array(
            'daysOfWeek' => [ $sa->weekday ],
            'startTime' => $sa->worktime,
            'title' => $sa->activity->name,
            'backgroundColor' => 'green',
            // 'borderColor' => $color ,
            // 'url' => route('attention.control', $a->id),

          );
          array_push($schedules,$a);
        }
        return view('admin.schedule.details.edit',compact('sch','schedules','sch_activities'));
    }
}
