<?php

use Illuminate\Database\Seeder;
use App\Models\Calendar;


class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // DB::table('calendar')->insert([
      //   'name' => 'Lenguaje ' . Str::random(10),
      //   'objective' => 'Poder aprender el lenguaje de señas',
      //   'scale_id' => 1,
      //   'user_id' => 1,
      //   'code' => 'ABCDEFGHI' . Str::random(10),
      //   'total_time' => 120,
      // ]);
      
      // $c = new Calendar();
      // $c->user_id = 1;
      // $c->name = "Primerizos";
      // $c->objective = "Primeros pasos nivel 1";
      // $c->save();
      
    }
}
