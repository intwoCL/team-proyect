<?php

use App\Models\ActivitySummaryReports;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $l = date('Y-m-d', strtotime('monday this week'));
    $m = date('Y-m-d', strtotime('tuesday this week'));
    $x = date('Y-m-d', strtotime('wednesday this week'));
    $j = date('Y-m-d', strtotime('monday this week' ));
    $f = date('Y-m-d', strtotime('thursday this week'));
    $s = date('Y-m-d', strtotime('saturday this week'));
    $d = date('Y-m-d', strtotime('sunday this week'));
    $days = [$l,$m,$x,$j,$f,$s,$d];


    $f = Faker\Factory::create('es_ES');
    $schudeles = Schedule::with(['schedulesActivities'])->get();
    foreach ($schudeles as $s) {
      foreach ($s->schedulesActivities as $sactivity) {
        // $day = $sactivity->weekday - 1;
        // $dateNow = date('Y-m-d');
        // $ns = $f->randomElement(range(1, 28), 15);
        $r = new ActivitySummaryReports();
        $r->activity_id = $sactivity->activity_id;
        $r->schedule_id = $s->id;
        $r->user_id = $s->user_id;
        $r->calendar_id = $s->calendar_id;
        $r->day_score =  $f->randomElement(ActivitySummaryReports::DAY_SCORE);
        $r->frequency_score =  $f->randomElement(ActivitySummaryReports::FRECUENCY_SCORE);
        $r->evaluation_score = $f->randomElement(ActivitySummaryReports::EVALUATION_SCORE);
        $r->finished_at = $days[$sactivity->weekday - 1];
        $r->save();
      }
    }

  }
}
