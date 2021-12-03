<?php

use App\Models\Activity;
use Illuminate\Database\Seeder;
use App\Models\Calendar;
use App\Models\CalendarActivity;
use App\Models\Schedule;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $c = new Calendar();
      $c->user_id = 1;
      $c->name = "Calendario 1";
      $c->objective = "Primeros pasos nivel 1";
      $c->status = 3;
      $c->save();

      $c = new Calendar();
      $c->user_id = 2;
      $c->name ="Calendario 2";
      $c->objective = "Primeros pasos nivel 1";
      $c->status = 3;
      $c->save();

      $c = new Calendar();
      $c->user_id = 1;
      $c->name = "Calendario 3";
      $c->objective = "Primeros pasos nivel 1";
      $c->status = 3;
      $c->save();

      $c = new Calendar();
      $c->user_id = 2;
      $c->name = "Calendario 4";
      $c->objective = "Primeros pasos nivel 1";
      $c->status = 3;
      $c->save();

      $f = Faker\Factory::create();

      for ($x=1; $x < 100; $x++) {
        $c = new Calendar();
        $c->user_id = $x%2 == 0 ? 1 : 2;
        $c->name = "Calendario $x " . $f->name;
        $c->objective = "Primeros " . $f->text(50);
        $c->status = 3;
        $c->save();
      }

      $activities = Activity::get();
      $total = $activities->count();

      for ($calendar_id=1; $calendar_id <= 100; $calendar_id++) {
        $count_activity = $f->numberBetween(1,20);
        for ($ca_id=1; $ca_id <= $count_activity; $ca_id++) {
          $ca = new CalendarActivity();
          $ca->calendar_id = $calendar_id;
          $ca->activity_id = $f->numberBetween(1,$total);
          $ca->weekday = $f->numberBetween(1,7);
          $ca->worktime = $f->time('H:i');
          $ca->times = $f->numberBetween(1,10);
          $ca->save();
        }
      }
    }
}
