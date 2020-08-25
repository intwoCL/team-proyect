<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Auth;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPasswordRequest;


class AuthUserController extends Controller
{

  public function index(){  
    if(auth('user')->check()){
      if(is_admin() || is_specialist()){
        return redirect()->route('dashboard.index');
      }else{
        return redirect()->route('webapp');
      }
    }else{
      return view('layouts.login');
    }
  }

  public function login(Request $request){
    try {
      close_sessions();
      $u = User::where('email',$request->email)->firstOrFail();
      $pass = hash('sha256', $request->password);
      
      if($u->password==$pass){
        Auth::guard('user')->loginUsingId($u->id);

        if(is_admin() || is_specialist()){
          return redirect()->route('dashboard.index');
        }
        return redirect()->route('webapp');
      }else{
        // return "usuario y contraseña no coinciden";
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      // return $th;
      return back()->with('info','Error. Intente nuevamente.'); 
    }
  }

  public function logout(){        
      close_sessions();
      return redirect('/');
  }

  public function reset(){
    return view('layouts.reset');
  }

  public function resetPassword(ResetPasswordRequest $request){
    try {
      $u = User::where('email',$request->email)->firstOrFail();
      $password = $u->changePassword();
      $mail = new ResetPasswordMail($password[0]);  
      Mail::to($u->email)->queue($mail);
      return back()->with('success','Se ha enviado un correo.');
    } catch (\Throwable $th) {
      return $th;
      // return back()->with('danger','Error intente nuevamente.');
    }
  }
}
