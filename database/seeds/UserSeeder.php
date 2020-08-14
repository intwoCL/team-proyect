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
      // 'first_name' => Str::random(10),
      'last_name' => 'Admin',
      // 'last_name' => Str::random(10),
      'email' => 'admin@example.com',
      'run' => Str::random(10),
      // 'password' => Hash::make('password'),
      'password' => hash('sha256', '123456'),
      'admin' => true,
      'specialist' => true
    ]);

    DB::table('users')->insert([
      'first_name' => 'Persona',
      // 'first_name' => Str::random(10),
      'last_name' => '1',
      // 'last_name' => Str::random(10),
      'email' => 'persona@example.com',
      'run' => Str::random(10),
      // 'password' => Hash::make('password'),
      'password' => hash('sha256', '123456'),
      'admin' => false,
      'specialist' => false
    ]);

    
    DB::table('users')->insert([
      'first_name' => 'Persona',
      // 'first_name' => Str::random(10),
      'last_name' => '2',
      // 'last_name' => Str::random(10),
      'email' => 'persona2@example.com',
      'run' => Str::random(10),
      // 'password' => Hash::make('password'),
      'password' => hash('sha256', '123456'),
      'admin' => false,
      'specialist' => true
    ]);
  }
}
