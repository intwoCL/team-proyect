<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calendar;
use App\Models\Activity;
use App\Models\CalendarActivity;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $calendars = Calendar::get();
      return view('admin.calendar.index',compact('calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.calendar.create');
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
        $c = new Calendar();
        $c->user_id = current_user()->id;
        $c->name = $request->input('name');
        $c->objective = $request->input('objective');
        $c->save();
        return redirect()->route('calendar.index')->with('success',trans('alert.success'));
      } catch (\Throwable $th) {
        // return redirect()->back()->with('danger',trans('alert.danger'));
        return $th;
      }
    }

    public function show($id){
      $c = Calendar::findOrFail($id);
      // $ca = CalendarActivity::where('calendar_id',$c->id)->get();

      $activities = $c->activities;

      $calendars = [];
      // $m = array();

      for ($i=0; $i < count($activities) ; $i++) { 
        switch ($activities[$i]->weekday) {
          case 1:
            $calendars[0][] = $activities[$i];
            break;
          case 2:
            $calendars[1][] = $activities[$i];
            break;
          case 3:
            $calendars[2][] = $activities[$i];
            break;
          case 4:
            $calendars[3][] = $activities[$i];
            break;
          case 5:
            $calendars[4][] = $activities[$i];
            break;
          case 6:
            $calendars[5][] = $activities[$i];
            break;
          case 7:
            $calendars[6][] = $activities[$i];
            break;
        }
      }
      return $calendars[0][0];

      return view('admin.calendar.details.index',compact('c'));
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
