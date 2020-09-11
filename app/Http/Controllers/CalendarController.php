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
      $activities = $c->present()->getActivitiesTable();
      $numbers = [];
      foreach ($activities as $a) {
        $numbers[] = count($a);
      }
      $max = (!empty($numbers)) ? max($numbers) : 0;
      return view('admin.calendar.details.index',compact('c','activities','max'));
    }

    public function edit($id)
    {
      $calendar = Calendar::findOrFail($id);
      return view('admin.calendar.edit',compact('calendar'));
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
      try {
        $c = Calendar::findOrFail($id);
        $c->name = $request->input('name');
        $c->objective = $request->input('objective');
        $c->status = $request->input('status');
        $c->update();
        return redirect()->back()->with('success',trans('alert.update'));
      } catch (\Throwable $th) {
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
}
