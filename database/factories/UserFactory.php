<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User as User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
  return [
    // 'email_verified_at' => now(),
    // 'remember_token' => Str::random(10),        
    'run' => Str::random(10),
    'first_name' => $faker->name,
    'last_name' => '',
    'email' => $faker->unique()->safeEmail,
    'password' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',
    // 'password' => hash('sha256', '123456'),
    'admin' => false,
    'specialist' => true
  ];
});
