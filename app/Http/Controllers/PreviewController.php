<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activity;
use App\Models\Content;
use App\Models\Item;

class PreviewController extends Controller
{
  public function content($id){
    // return $id;
    return view('preview.item',compact('id'));
  }

  public function item($id){
    $item = Item::findOrFail($id);
    $back = route('content.show',[$item->content->activity_id,$item->content_id]);
    return view('preview.item',compact('item','back'));
  }
}
