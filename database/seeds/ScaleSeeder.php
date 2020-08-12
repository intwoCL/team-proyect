<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i < 5; $i++) { 
        DB::table('scales')->insert([
          'name' => "Level $i"
        ]);
      }
    }
}
