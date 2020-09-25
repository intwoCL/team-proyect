<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Assignment;

use App\Http\Requests\AssignmentStoreRequest;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::where('specialist',true)->get();
      return view('admin.assignment.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignmentStoreRequest $request)
    {
      try {
        $users_id = $request->input('users');
        $user_id  = $request->input('id');
  
        foreach ($users_id as $value) {
          $a = new Assignment();
          $a->user_id = $value;
          $a->specialist_id = $user_id;
          $a->active = 1;
          $a->save();
        }
        return redirect()->route('assignment.show',$user_id)->with('success',trans('alert.success'));
      } catch (\Throwable $th) {
        //throw $th;
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
      $user = User::where('specialist',true)->findOrFail($id);
      return view('admin.assignment.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::where('specialist',true)->findOrFail($id);
      $assigments = $user->assignmentUsers->pluck('user_id');
      if (count($assigments)>0){
        $users = User::where('id','<>',$id)->whereNotIn('id',$assigments)->get();
      }else{
        $users = User::where('id','<>',$id)->get();
      }
      return view('admin.assignment.edit',compact('user','users'));
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
        $validate = explode('-',$request->id);
        $user_id = $validate[0];
        $specialist_id = $validate[1];
        $id = $validate[2];
        $c = Assignment::where('specialist_id',$specialist_id)->where('user_id',$user_id)->findOrFail($id)->delete();
        return redirect()->back()->with('success',trans('alert.delete'));
      } catch (\Throwable $th) {
        return redirect()->back()->with('danger',trans('alert.danger'));
      }
    }
}
