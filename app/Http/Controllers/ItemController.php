<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Activity;
use App\Models\Content;
use App\Models\Item;

use App\Presenters\Data\TypeData;


class ItemController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($activity_id,$content_id)
  {
    // $a = Activity::FindOrFail($activity_id);
    // $c = Content::FindOrFail($content_id);
    // $types = (new ItemData);
    // return (new TypeData())->types;
    // return view("admin.activity.content.item.create",compact('a','c','types'));
  }

  public function store($id,$id_c,Request $request)
  {
    try {
    $c = Content::where('activity_id',$id)->findOrFail($request->input('id'));
    $i = new Item();
    $i->content_id = $c->id;
    $i->type = 5;
    $i->name = $request->input('name');
    $i->position = Item::where('content_id',$i->content_id)->count() + 1;
    $i->save();
    return redirect()->back()->with('success',trans('alert.success'));
    } catch (\Throwable $th) {
      return $th;
      return redirect()->back()->with('danger',trans('alert.danger'));
    }
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  // public function store(Request $request)
  // {
  //     try {

  //         $c = Content::findOrFail($request->input('content_id'));
  //         $a = Activity::findOrFail($c->activity_id);

  //         $i = new Item();
  //         $i->content_id = $c->content_id;
  //         $i->title = $request->input('title');
  //         $i->content = $request->input('content');
  //         $i->type = $request->input('type');
  //         $i->position = Item::where('content_id',$i->content_id)->count() + 1;

  //         if($i->type==1){
  //           $i->body = $request->input('url');
  //         }elseif($i->type==2){
  //           $i->body = $request->input('video');
  //         } else if($i->type==3){
  //           $file = $request->file('photo');
  //           $filename = trim($i->title) . time() .'.'.$file->getClientOriginalExtension();
  //           $path = $file->storeAs('public/photo_items',$filename);
  //           $i->body = $filename;
  //         }else{
  //           $i->audio = $request->input('audio');
  //           $file = $request->file('audio');
  //           $filename = trim($i->title) . time() .'.'.$file->getClientOriginalExtension();
  //           $path = $file->storeAs('public/audio_items',$filename);
  //           $i->body = $filename;
  //         }


  //         $i->save();
  //         return redirect()->route('content.show',[$a->id , $c->id]);

  //     } catch (\Throwable $th) {
  //         return $th;
  //         return redirect()->back()->with('danger',trans('alert.danger'));
  //     }
  // }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($activity_id,$content_id,$id)
  {
    $a = Activity::FindOrFail($activity_id);
    $c = Content::FindOrFail($content_id);
    return view('admin.activity.content.item.show',compact('a','c'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $i = Item::FindOrFail($id);
    $types = (new TypeData())->types;
    return view('admin.activity.content.item.edit',compact('i','types'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($id,Request $request)
  {
    try {
      $i = Item::findOrFail($id);
      $i->name = $request->input('name');
      $i->title = $request->input('title');
      $i->content = $request->input('content');
      $i->type = $request->input('type');
      $i->body = $request->input('body');

      if($i->type == 1){
        $i->body = $request->input('url'); 
      }elseif($i->type == 2){
        $i->body = $request->input('video'); 
      }elseif($i->type == 3){
        if(!empty($request->file('photo'))){
        $request->validate([
          'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);
        $file = $request->file('photo');
        $filename = trim($i->title) . time() .'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/photo_items',$filename);
        $i->body = $filename;
        }else{
          return redirect()->back()->with('warning',trans('alert.warning'));
        }
      }elseif($i->type == 4){
        if(!empty($request->file('audio'))){

        $file = $request->file('audio');
        $filename = trim($i->title) . time() .'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/audio_items',$filename);
        $i->body = $filename;
        }else{
          return redirect()->back()->with('warning',trans('alert.warning'));
        }
      }

      $c = Content::findOrFail($i->content_id);
      $a = Activity::findOrFail($c->activity_id);
      $i->update();
      return redirect()->back()->with('success',trans('alert.success'));

    } catch (\Throwable $th) {
      return $th;
      return redirect()->back()->with('danger',trans('alert.danger'));
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    $i = Item::findOrFail($request->input('id'));
    $i->destroy();
    
  }

  public function changePosition($activity_id,$content_id, Request $request){
    $oldIndex = $request->input('params.oldIndex');
    $newIndex = $request->input('params.newIndex');

    try {
    $origin = Item::where('content_id',$content_id)->where('position',$oldIndex)->first();
    $destiny = Item::where('content_id',$content_id)->where('position',$newIndex)->first();

    $origin->position = $newIndex;
    $destiny->position = $oldIndex;

    $origin->update();
    $destiny->update();

    return response()->json(['message' => 'Yup. This request succeeded.'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
