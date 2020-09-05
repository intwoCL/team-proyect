<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Socialite;
use Exception;

class IntegrationController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function handleGoogleCallback()
  {
    try {
      close_sessions();
      $user = Socialite::driver('google')->user();
      $id = $user->getId();
      $email = $user->getEmail();
      $foto = $user->getAvatar();
      
      $u = User::where('email',$email)->firstOrFail();
      
      if($u->google_id != $id){
          $u->foto = $foto;
          $u->google_id = $id;
          $u->update();
      }
      // Auth::guard('usuario')->loginUsingId($u->id_usuario);
      // return redirect()->route('home.index');
    } catch (\Throwable $th) {
      return $th;
        // return redirect()->to('/')->with('info','Gmail no responde.');
    }
  }


}
