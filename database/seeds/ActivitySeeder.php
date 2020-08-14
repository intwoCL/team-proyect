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
      DB::table('activities')->insert([
        'name' => 'Lenguaje de señas',
        'objective' => 'Poder aprender el lenguaje de señas',
        'photo' => 'example.jpg',
        'scale_id' => 1,
        'user_id' => 1,
        'code' => 'ABCDEFGHIJKLMNOPQRSTW',
        'total_time' => 120,
      ]);
    }
}
