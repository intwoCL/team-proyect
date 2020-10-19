<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ScheduleActivity;
use App\Models\Schedule;
use App\Models\ActivitySummary;
use App\Models\Content;
use Carbon\Carbon;

class ActivitySummaryController extends Controller
{
  // update store
  public function update(Request $request){
    try {
      $summary_id = $request->input('data.id'); 
      $scheduleActivity_id = $request->input('data.saId');
      $content_id = $request->input('data.cId');
      $store = $request->input('data.store');
      $feedback = $request->input('data.feedback');
      $finish = $request->input('data.finish');

      $scheduleActivity = ScheduleActivity::findOrFail($scheduleActivity_id);
      // es mi horario, esta activado y es la id correcta
      $schedule = Schedule::where('user_id',current_user()->id)->where('status',2)->findOrFail($scheduleActivity->schedule_id);
      $content = Content::findOrFail($content_id);
      $summary = ActivitySummary::findOrFail($summary_id);
      if(!empty($store)){
        $summary->store = $store;
      }
      $summary->feedback = $feedback;
      $summary->finished_at = date('Y-m-d H:i:s');
      $summary->update();
      
      if($finish){
        return response()->json(['message' => 'Yup. This request succeeded.','status' => '200','code'=>'exit'], 200);
      }else{
        return response()->json(['message' => 'Yup. This request succeeded.','status' => '200','code'=>'ok'], 200);
      }
    } catch (\Throwable $th) {
      // return $th;
      return \response()->json([
        'status' => '400',
        'message' => 'error'], 400);
    }
  }
}
