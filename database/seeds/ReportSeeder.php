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


    $l = date('Y-m-d', strtotime('monday last week'));
    $m = date('Y-m-d', strtotime('tuesday last week'));
    $x = date('Y-m-d', strtotime('wednesday last week'));
    $j = date('Y-m-d', strtotime('monday last week' ));
    $f = date('Y-m-d', strtotime('thursday last week'));
    $s = date('Y-m-d', strtotime('saturday last week'));
    $d = date('Y-m-d', strtotime('sunday last week'));
    $last_days = [$l,$m,$x,$j,$f,$s,$d];

    $l = date('Y-m-d', strtotime('monday this week'));
    $m = date('Y-m-d', strtotime('tuesday this week'));
    $x = date('Y-m-d', strtotime('wednesday this week'));
    $j = date('Y-m-d', strtotime('monday this week' ));
    $f = date('Y-m-d', strtotime('thursday this week'));
    $s = date('Y-m-d', strtotime('saturday this week'));
    $d = date('Y-m-d', strtotime('sunday this week'));
    $days = [$l,$m,$x,$j,$f,$s,$d];

    $l = date('Y-m-d', strtotime('monday next week'));
    $m = date('Y-m-d', strtotime('tuesday next week'));
    $x = date('Y-m-d', strtotime('wednesday next week'));
    $j = date('Y-m-d', strtotime('monday next week' ));
    $f = date('Y-m-d', strtotime('thursday next week'));
    $s = date('Y-m-d', strtotime('saturday next week'));
    $d = date('Y-m-d', strtotime('sunday next week'));
    $next_days = [$l,$m,$x,$j,$f,$s,$d];


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
        $r->day_score =  $f->randomElement(ActivitySummaryReports::DAY_SCORE_NUMBER);
        $r->frequency_score =  $f->randomElement(ActivitySummaryReports::FRECUENCY_SCORE_NUMBER);
        $r->evaluation_score = $f->randomElement(ActivitySummaryReports::EVALUATION_SCORE_NUMBER);
        $r->finished_at = $last_days[$sactivity->weekday - 1];
        $r->save();

        $r = new ActivitySummaryReports();
        $r->activity_id = $sactivity->activity_id;
        $r->schedule_id = $s->id;
        $r->user_id = $s->user_id;
        $r->calendar_id = $s->calendar_id;
        $r->day_score =  $f->randomElement(ActivitySummaryReports::DAY_SCORE_NUMBER);
        $r->frequency_score =  $f->randomElement(ActivitySummaryReports::FRECUENCY_SCORE_NUMBER);
        $r->evaluation_score = $f->randomElement(ActivitySummaryReports::EVALUATION_SCORE_NUMBER);
        $r->finished_at = $days[$sactivity->weekday - 1];
        $r->save();

        $r = new ActivitySummaryReports();
        $r->activity_id = $sactivity->activity_id;
        $r->schedule_id = $s->id;
        $r->user_id = $s->user_id;
        $r->calendar_id = $s->calendar_id;
        $r->day_score =  $f->randomElement(ActivitySummaryReports::DAY_SCORE_NUMBER);
        $r->frequency_score =  $f->randomElement(ActivitySummaryReports::FRECUENCY_SCORE_NUMBER);
        $r->evaluation_score = $f->randomElement(ActivitySummaryReports::EVALUATION_SCORE_NUMBER);
        $r->finished_at = $next_days[$sactivity->weekday - 1];
        $r->save();
      }
    }

  }
}
