<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebAppController extends Controller
{
  public function index(){
    return view('webapp.app');
  }

  public function store(Request $request){
    return $request;
  }


  public function activity(){
    return view('webapp.activity');
  }

  public function item(){
    return view('webapp.items');
  }




}
