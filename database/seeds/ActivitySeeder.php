<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 100; $i++) { 
        DB::table('activities')->insert([
          'name' => 'Lenguaje ' . Str::random(10),
          'objective' => 'Poder aprender el lenguaje de señas',
          'scale_id' => 1,
          'user_id' => 1,
          'code' => 'ABCDEFGHI' . Str::random(10),
          'total_time' => 120,
        ]);
      }
    }
}
