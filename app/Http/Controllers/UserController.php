<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Assignment;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::get();
      return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
      try {
        $u = new User();
        $u->email = $request->input('email');
        $u->password = hash('sha256', $request->input('password'));        
        $u->first_name = $request->input('first_name');
        $u->last_name = $request->input('last_name');
        $u->child_name = !empty($request->input('child_name')) ? $request->input('child_name') : '';
        $u->lang = $request->input('lang');
        $u->gender = $request->input('gender');
        $u->admin = !empty($request->input('admin')) ? true : false;
        $u->specialist = !empty($request->input('specialist')) ? true : false;
        $u->specialty = !empty($request->input('specialty')) ? $request->input('specialty') : '';

        if(!empty($request->file('photo'))){
          $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
            $file = $request->file('photo');
            $filename = time() .'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/photo_users',$filename);
            $u->photo= $filename;
        }
        
        $u->save();
        return redirect()->route('user.index')->with('success',trans('alert.success'));
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
      $user = User::findOrFail($id);
      return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
      try {
        $u = User::findOrFail($id);
        $u->email = $request->input('email');
        $u->first_name = $request->input('first_name');
        $u->last_name = $request->input('last_name');
        $u->child_name = !empty($request->input('child_name')) ? $request->input('child_name') : '';
        $u->lang = $request->input('lang');
        $u->gender = $request->input('gender');
        $u->admin = !empty($request->input('admin')) ? true : false;
        $u->specialist = !empty($request->input('specialist')) ? true : false;
        $u->specialty = !empty($request->input('specialty')) ? $request->input('specialty') : '';

        if(!empty($request->file('photo'))){
          $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
            $file = $request->file('photo');
            $filename = time() .'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/photo_users',$filename);
            $u->photo= $filename;
        }
        $u->update();
        return back()->with('success',trans('alert.update'));
      } catch (\Throwable $th) {
        return back()->with('danger',trans('alert.danger'));
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
      
    }

    public function updateEmail(Request $request, $id)
    {
      try {
        $u = User::findOrFail($id);
        $newPassword = $request->input('password');
        $u->changePassword($newPassword);
        return back()->with('success',trans('alert.update'));
      } catch (\Throwable $th) {
        return back()->with('danger',trans('alert.danger'));
      }
    }

    public function profile()
    {
      //$user = User::findOrFail($id);
      $user = current_user();
      return view('admin.user.profile',compact('user'));
    }

    public function sendEmail()
    {
      # code...
    }
}
