<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
  
    DB::table('users')->insert([
      'first_name' => 'Super',
      'last_name' => 'Admin',
      'email' => 'admin@example.com',
      'run' => Str::random(10),
      'password' => hash('sha256', '123456'),
      'admin' => true,
      'specialist' => true
    ]);

    factory(App\Models\User::class, 10)->create();
  }
}
