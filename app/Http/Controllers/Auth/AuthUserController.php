<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Auth;


class AuthUserController extends Controller
{
  public function index(){
    close_sessions();
    return view('layouts.login');
  }

  public function login(Request $request){
    try {
      close_sessions();
      $u = User::where('email',$request->email)->firstOrFail();
      $pass = hash('sha256', $request->password);
      
      if($u->password==$pass){
        Auth::guard('user')->loginUsingId($u->id);
        return redirect()->route('dashboard.index');
      }else{
        return "usuario y contraseña no coinciden";
        // return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return $th;
      // return back()->with('info','Error. Intente nuevamente.'); 
    }
}

public function logout(){        
    close_sessions();
    return redirect('/');
}

public function reset()
{
  return view('layouts.forgot-password');
}

public function resetPassword (Request $request)
{
  try {
    $u = User::where('email',$request->email)->firstOrFail();
    $u->changePassword();

    return "Ok";
    
  } catch (\Throwable $th) {
    return $th;
    return back()->with('info','Error. Intente nuevamente.');
  }
}

}
