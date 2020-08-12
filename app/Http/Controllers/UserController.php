<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest as UsTRest;

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
    public function store(UsTRest $request)
    {
      //return $request;
      try {
        $u = new User();
        $u->email = $request->input('email');
        $u->password = hash('sha256', $request->input('password'));
        $u->first_name = $request->input('first_name');
        $u->last_name = $request->input('last_name');
        $u->lang = $request->input('lang');

        if (!empty($request->input('run'))) {
          $u->run = $request->input('run');
        }
        
        if (!empty($request->input('admin'))) {
          $u->admin = true;
        }

        if (!empty($request->input('specialist'))) {
          $u->specialist = true;
        }
        // if(!empty($request->file('photo'))){
        //   $request->validate([
        //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //   ]);
        //   $photo_name = time().'.'.$request->image->extension();  
        //   $request->image->move(public_path('/dir/formulario/'), $photo_name);
        //   $a->foto = "/dir/formulario/$photo_name";
        // }
        $u->photo = 'image.png';

        $u->save();
        return $u;
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
