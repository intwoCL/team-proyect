<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Activity;
use App\Models\Content;
use App\Models\Item;

use App\Presenters\Data\TypeData;


class ItemController extends Controller
{

  public function store($id,$id_c,Request $request)
  {
    try {
    $c = Content::where('activity_id',$id)->findOrFail($request->input('id'));
    $i = new Item();
    $i->content_id = $c->id;
    $i->name = $request->input('name');
    $i->position = Item::where('content_id',$i->content_id)->count() + 1;    
    $i->save();
    return redirect()->back()->with('success',trans('alert.success'));
    } catch (\Throwable $th) {
      return redirect()->back()->with('danger',trans('alert.danger'));
    }
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
      $i->body = !empty($request->input('body')) ? $request->input('body') : '' ;
      $i->type = $request->input('type');
      // 1 => 'URL', 2 => 'Video', 3 => 'Imagen', 4 => 'Audio', 5 => 'Texto',
      if($i->type == 1){
        $i->data = $request->input('url');
      }elseif($i->type == 2){
        $i->data = $request->input('video');
      }elseif($i->type == 3){
        if(!empty($request->file('photo'))){
          $validator = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          $file = $request->file('photo');
          $filename = time().'.'.$file->getClientOriginalExtension();
          $path = $file->storeAs('public/photo_items',$filename);
          $i->image = $filename;
        }
      }elseif($i->type == 4){
        if(!empty($request->file('audio'))){
          $file = $request->file('audio');
          $filename = time().'.'.$file->getClientOriginalExtension();
          $path = $file->storeAs('public/audio_items',$filename);
          $i->data = $filename;

          if(!empty($request->file('image'))){
            $request->validate([
              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $file1 = $request->file('image');
            $filename1 = time().'.'.$file1->getClientOriginalExtension();
            $path1 = $file1->storeAs('public/photo_items',$filename1);
            $i->image = $filename1;
          }
        }
      }

      $c = Content::findOrFail($i->content_id);
      $a = Activity::findOrFail($c->activity_id);
      $i->update();
      return back()->with('success',trans('alert.success'));
    } catch (\Throwable $th) {
      return back()->with('danger',trans('alert.danger'));
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
    try {
      $i = Item::findOrFail($request->input('id'));
      $i->delete();
      return back()->with('success',trans('alert.delete'));
    } catch (\Throwable $th) {
      return back()->with('danger',trans('alert.danger'));
    }

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
