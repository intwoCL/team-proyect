<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $categories = [
        'Sensitivo',
        'Manipulacion',
        'Objetivos'
      ];
  
      foreach ($categories as $key => $value) {
        DB::table('categories')->insert([
          'name' => $value
        ]);
      }
    }
}
