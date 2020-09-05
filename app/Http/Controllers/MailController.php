<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;

class MailController extends Controller
{
  public function sendEmail(){
    try {
      $email = "benja.mora.torres@gmail.com";
      $password = "123123aa";
      
      $mail = new ResetPasswordMail($password);
      
      Mail::to($email)->queue($mail);
      
      return $mail;
    } catch (\Throwable $th) {
      //throw $th;
      return $th;
    }
  }
}
