<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Content;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;

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
        $a = Activity::FindOrFail($activity_id);
        $c = Content::FindOrFail($content_id);
        $types =Type::all();
        return view("admin.activity.content.item.create",compact('a','c','types'));
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
            $i = new Item();
            $i->content_id = $request->input('content_id');
            $i->title = $request->input('title');
            $i->content = $request->input('content');
            $i->type_id = $request->input('type');
            $i->position = Item::Where('content_id',$i->content_id)->count() + 1;

            if($i->type_id==1){
                $i->url = $request->input('url');
            }

            if($i->type_id==2){
                $i->video = $request->input('video');
            }

            if($i->type_id==3){
                $file = $request->file('photo');
                $filename = $i->title . time() .'.'.$file->getClientOriginalExtension();
                $path = $file->storeAs('public/photo_items',$filename);
                $i->photo= $filename;
            }

            if($i->type_id==4){
                $i->audio = $request->input('audio');
            }

            if($i->type_id==5){
                $i->text = $request->input('text');
            }

            $c = Content::findOrFail($i->content_id);
            $a = Activity::findOrFail($c->activity_id);

            $i->save();
            return redirect()->route('content.show',[$a->id , $c->id]);

        } catch (\Throwable $th) {
            return $th;
            return redirect()->back()->with('danger',trans('alert.danger'));
        }
    }

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
    public function edit($activity_id,$content_id,$id)
    {
        $i = Item::FindOrFail($id);
        $types = Type::all();
        foreach ($types as $t) {
            if($t->id == $i->type_id){
                $t->select='selected';
            }
        }
        return view('admin.activity.content.item.edit',compact('i','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $i = Item::findOrFail($request->input('id'));
            $i->title = $request->input('title');
            $i->content = $request->input('content');
            $i->type_id = $request->input('type');
            $i->position = Item::Where('content_id',$i->content_id)->count() + 1;

            if($i->type_id==1){
                $i->url = $request->input('url');
            }

            if($i->type_id==2){
                $i->video = $request->input('video');
            }

            if($i->type_id==3){
                $file = $request->file('photo');
                $filename = $i->title . time() .'.'.$file->getClientOriginalExtension();
                $path = $file->storeAs('public/photo_items',$filename);
                $i->photo= $filename;
            }

            if($i->type_id==4){
                $i->audio = $request->input('audio');
            }

            if($i->type_id==5){
                $i->text = $request->input('text');
            }


            //$i->types = new Type();

            $c = Content::findOrFail($i->content_id);
            $a = Activity::findOrFail($c->activity_id);

            $i->save();
            return redirect()->route('content.show',[$a->id , $c->id]);

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
    public function destroy($id)
    {
        //
    }

    public function changePosition($activity_id,$content_id, Request $request){
        $oldIndex = $request->input('params.oldIndex');
        $newIndex = $request->input('params.newIndex');

        try {
            $origin = Item::where('content_id',$content_id)->where('position',$oldIndex)->first();
            $destiny = Item::where('content_id',$content_id)->where('position',$newIndex)->first();

            $origin->position = $newIndex;
            $destiny->position = $oldIndex;

            $origin->save();
            $destiny->save();

            return response()->json(['message' => 'Yup. This request succeeded.'], 200);
        } catch (\Throwable $th) {
            return $th;
        }
      }
}
