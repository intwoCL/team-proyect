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
    // return view('auth.usuario');
  }

  public function login(Request $request){
    return redirect()->route('activity.index');

    return $request;
    try {
        close_sessions();
        $u = User::where('email',$request->email)->firstOrFail();

        $pass =  hash('sha256', $request->password);
        
        if($u->password==$pass){
            Auth::guard('usuario')->loginUsingId($u->id_usuario);

            // return redirect()->route('home.index');
        }else{
            // return back()->with('info','Error. Intente nuevamente.');
        }
    } catch (\Throwable $th) {
        return $th;
        // return back()->with('info','Error. Intente nuevamente.'); 
    }
}

public function logout(){        
    close_sessions();
    // return redirect()->route('auth.usuario.login');
}
}
