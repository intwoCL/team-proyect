<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attention;


class AttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $attentions = Attention::where('specialist_id', current_user()->id)->get();
      // return $a;
      $calendario = array();
      foreach ($attentions as $a) {
          $color = $this->color($a->status);
          $a = array(
              'title' => $a->user->getFullName(),
              'start' => $a->attention_date . " " . $a->attention_time ,
              'backgroundColor' => $color,
              'borderColor' => $color ,
              'url' => route('attention.control', $a->id),
          );
          array_push($calendario,$a);
      }
      // return $calendario;
      return view('admin.attention.index', compact('calendario'));
    }

    private function color($status){
      $color = "";
      switch ($status) {
          case 1: //pendiente
            $color ="#f39c12";
            break;
          case 2: // Realizado
            $color ="#00a65a";
            break;
          case 3: // Cancelado
            $color ="#dd4b39";              
            break;
      }
      return $color;
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {

      return view('admin.attention.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $a = new Attention();
        $a->user_id = $request->input('user_id');
        $a->specialist_id = current_user()->id;
        $a->attention_date = date_format(date_create($request->input('attention_date')),'Y-m-d');
        $a->attention_time = $request->input('attention_time');
        $a->comment_in = $request->input('comment_in');
        // $age->fecha_agenda = date_format(date_create($request->input('fecha_agenda')),'Y-m-d');
        $a->save();
        return redirect()->route('attention.index')->with('success',trans('alert.success'));
      } catch (\Throwable $th) {
        //throw $th;
        // return redirect()->back()->with('danger',trans('alert.danger'));
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
      return $id;
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

    public function assigned()
    {
      return view('admin.attention.assigned');
    }
}
