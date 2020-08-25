<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebAppController extends Controller
{
  public function index()
  {
    return view('webapp.app');
  }

  public function store(Request $request){
    return $request;
  }

}
