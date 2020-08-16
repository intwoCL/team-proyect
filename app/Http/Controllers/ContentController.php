<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Activity;
use App\Models\Item;

class ContentController extends Controller
{
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($activity_id)
  {
    $activity = Activity::where('id',$activity_id)->firstOrFail();
    return view('admin.activity.content.create',compact('activity')); 
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
      $c = new Content();
      $c->activity_id = $request->input('activity_id');
      $c->name = $request->input('name');

      if (!empty($request->input('objective'))) {
        $c->objective = $request->input('objective');
      }

      if (!empty($request->input('quiz'))) {
        $c->quiz = $request->input('quiz');
      }
      $c->save();
      return redirect()->route('activity.show')->with('success',trans('alert.success'));
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
  public function show($activity_id,$id)
  {
    $content = Content::where('id',$id)->where('activity_id',$activity_id)->firstOrFail();
    return view('admin.activity.content.show',compact('content'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($activity_id,$id)
  {
    $content = Content::where('id',$id)->where('activity_id',$activity_id)->firstOrFail();
    return view('admin.activity.content.edit',compact('content'));
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
    //pendiente
    $content = Content::where('id',$id)->firstOrFail();

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
