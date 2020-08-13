<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ExternalSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i=1; $i < 5; $i++){ 
      DB::table('scales')->insert([
        'name' => "Level $i"
      ]);
    }
  }
}
