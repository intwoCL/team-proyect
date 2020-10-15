<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Category;
use App\Models\ActivityCategory;
use App\Models\Scale;

use App\Http\Requests\ActivityStoreRequest;

class ActivityController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $activities = Activity::get();
    return view('admin.activity.index',compact('activities'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $scales = Scale::get();
    $categories = Category::get();
    return view('admin.activity.create',compact('categories','scales'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ActivityStoreRequest $request)
  {
    try{
      $a = new Activity();
      $a->name = $request->input('name');
      $a->objective = $request->input('objective');
      $a->scale_id = $request->input('scale_id');
      $a->total_time = $request->input('total_time');
      $a->user_id = current_user()->id;
      $a->code = $this->getCodeRandom();

      if(!empty($request->file('photo'))){
        $request->validate([
          'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);
        $file = $request->file('photo');
        $filename = time() .'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/photo_activities',$filename);
        $a->photo= $filename;
      }     
      $a->save();
      $categories = $request->input('categories');
      for ($i=0; $i < count($categories) ; $i++) {
        $ac = new ActivityCategory();
        $ac->category_id = $categories[$i];
        $ac->activity_id = $a->id;
        $ac->save();
      }
      return redirect()->route('activity.index')->with('success',trans('alert.success'));
    } catch (\Throwable $th) {
      // return $th;
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
    $a = Activity::FindOrFail($id);
    return view('admin.activity.show',compact('a'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $status = array('1' => 'pending' , '2' => 'finished' );
    $scales = Scale::get();
    $categories = Category::get();
    $activity = Activity::FindOrFail($id);

    // TODO: Buscar una forma de no hacer esto
    $tags= $activity->tagsCategories;
    foreach ($categories as $c){
      foreach ($tags as $t) {
        if ($c->id == $t->category_id){
          $c->selected = true;
          break;
        }
      }
    }
    return view('admin.activity.edit',compact('status','categories','scales','activity','tags'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ActivityStoreRequest $request, $id)
  {
    try {
      $a = Activity::FindOrFail($id);
      $a->name = $request->input('name');
      $a->objective = $request->input('objective');
      $a->scale_id = $request->input('scale_id');
      $a->total_time = $request->input('total_time');
      $a->status = $request->input('status');
      
      if(!empty($request->file('photo'))){
        $request->validate([
          'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);
        $file = $request->file('photo');
        $filename = time() .'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/photo_activities',$filename);
        $a->photo= $filename;
      }

      // TODO: Buscar una forma de no hacer esto
      $a->tagsCategories()->delete();
      $categories = $request->input('categories');
      for ($i=0; $i < count($categories) ; $i++) {
        $ac = new ActivityCategory();
        $ac->category_id = $categories[$i];
        $ac->activity_id = $a->id;
        $ac->save();
      }
      $a->update();
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
  public function destroy(Request $request)
  {
    try {
      $a = Activity::findOrFail($request->input('id'));
      $a->delete();
      return redirect()->route('activity.index')->with('success',trans('alert.success'));
    } catch (\Throwable $th) {
      return back()->with('danger',trans('alert.danger'));
    }
  }

  //crear funcion buscar codigo de largo 10
  private function getCodeRandom(){
    try {
      $code = helper_random_string_number(10);
      $a = Activity::where('code',$code)->firstOrFail();
      return $this->getCodeRandom();
    } catch (\Throwable $th) {
      return $code;
    }
  }

  // private setActivity(){

  // }
}
