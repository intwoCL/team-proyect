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
        $calendars = Calendar::get();
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
            $sch->status = $cal->status;
            $sch->objective = $cal->objective;
            $sch->comment = '';
            $sch->save();

            // Crear los Schedules Activities
            foreach ($cal->activities as $ca) {
                $sa = new ScheduleActivity();
                $sa->schedule_id = $sch->id; // ??
                $sa->calendar_id = $cal->id;
                $sa->activity_id = $ca->id;
                $sa->weekday = $ca->weekday;
                $sa->worktime = $ca->worktime;
                $sa->times = $ca->times;
                $sa->save();
            }

            return redirect()->route('schedule.index',$user_id);

        } catch (\Throwable $th) {
            // return redirect()->back()->with('danger',trans('alert.danger'));
            return $th;
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
        // $activities = $c->present()->getActivitiesTable();
        // $numbers = [];
        // foreach ($activities as $a) {
        //   $numbers[] = count($a);
        // }
        // $max = (!empty($numbers)) ? max($numbers) : 0;
        // return view('admin.schedule.edit',compact('c','activities','max'));
        return $sch->schedulesActivities;
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
}
