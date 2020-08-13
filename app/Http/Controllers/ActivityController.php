<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Category;
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
      $a->objetive = $request->input('objetive');
      $a->scale_id = $request->input('scale_id');
      $a->total_time = $request->input('total_time');
      $a->user_id = current_user()->id;
      $a->code = $this->getCodeRandom();
      //Foto
      $a->photo = 'example.png';
      // if(!empty($request->file('photo'))){
      //   $request->validate([
      //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      //   ]);
      //   $photo_name = time().'.'.$request->image->extension();  
      //   $request->image->move(public_path('/dir/formulario/'), $photo_name);
      //   $a->foto = "/dir/formulario/$photo_name";
      // } 

      $a->save();
    } catch (\Throwable $th) {
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
    $scales = Scale::get();
    $categories = Category::get();
    $activity = Activity::where('id',$id)->firstOrFail();
    return view('admin.activity.edit',compact('categories','scales','activity'));
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
      $a = Activity::where('id',$id)->FirstOrFail(); 
      $a->name = $request->input('name');
      $a->objetive = $request->input('objetive');
      $a->scale_id = $request->input('scale_id');
      $a->total_time = $request->input('total_time');
      $a->update();
    } catch (\Throwable $th) {
      //throw $th;
      return $th;
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
}
