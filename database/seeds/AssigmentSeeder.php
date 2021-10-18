<?php

use App\Models\Assignment;
use App\Models\Calendar;
use App\Models\Schedule;
use App\Models\ScheduleActivity;
use App\Models\User;
use Illuminate\Database\Seeder;

class AssigmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $f = Faker\Factory::create();

      $users = User::get();

      foreach ($users as $u) {
        $a = new Assignment();
        $a->specialist_id = 2;
        $a->user_id = $u->id;
        $a->active = true;
        $a->save();
      }

      $asig = Assignment::get();
      $calendars = Calendar::where('user_id',2)->get()->pluck('id');

      foreach ($asig as $as) {
        $s = new Schedule();
        $s->user_id = $as->user_id;
        $s->specialist_id = 2;
        $s->name = 'Calendario de evaluacion';
        $s->objective = 'Evaluacion del paciente';
        // $s->objective = 'Evaluacion del paciente';
        $s->calendar_id = $f->randomElement($calendars);
        $s->save();
      }

      $schedules = Schedule::with(['calendar','calendar.activities'])->get();

      foreach ($schedules as $sc) {
        foreach ($sc->calendar->activities as $xx) {
          $sa = new ScheduleActivity();
          $sa->schedule_id = $sc->id;
          $sa->calendar_id = $sc->calendar_id;
          $sa->activity_id = $xx->activity_id;
          $sa->weekday = $xx->weekday;
          $sa->worktime = $xx->worktime;
          $sa->times = $xx->times;
          $sa->save();
        }
      }
    }
}
