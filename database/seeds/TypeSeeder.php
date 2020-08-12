<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $types = [
      'url',
      'imagen',
      'text'
    ];

    foreach ($types as $key => $value) {
      DB::table('types')->insert([
        'name' => $value
      ]);
    }
  }
}
