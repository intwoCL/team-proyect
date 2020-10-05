<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->truncateTables([
      'users',
      'scales',
      'categories',
      // 'activities',
      // 'contents'

    ]);
    
    $this->call(UserSeeder::class);
    $this->call(ScaleSeeder::class);
    $this->call(CategorySeeder::class);
    // $this->call(ActivitySeeder::class);
    // $this->call(ContentSeeder::class);
  }

  public function truncateTables(array $tables)
  {
    DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

    foreach ($tables as $table) {
        DB::table($table)->truncate();
    }

    DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
  }
}
