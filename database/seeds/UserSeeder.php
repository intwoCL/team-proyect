<?php

use App\Models\User;
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
    $f = Faker\Factory::create('es_ES');

    $pass = hash('sha256', '123456');
    $usuarios_fake = [
      [
        'first_name' => 'Tea',
        'last_name' => 'Administrador',
        'email' => 'admin@admin.com',
        'password' => $pass,
        'admin' => true,
        'specialist' => true
      ],
      [
        'first_name' => 'Tea',
        'last_name' => 'Especialista',
        'email' => 'especialista@admin.com',
        'password' => $pass,
        'admin' => false,
        'specialist' => true
      ],
      [
        'first_name' => 'Tea',
        'last_name' => 'Administrador',
        'email' => 'usuario@admin.com',
        'child_name' => $f->name,
        'password' => $pass,
        'admin' => false,
        'specialist' => false
      ]];

    foreach ($usuarios_fake as $key => $v) {
      $u = new User();
      $u->first_name = $v['first_name'];
      $u->last_name =  $v['last_name'];
      $u->email =  $v['email'];
      $u->password = $pass;
      $u->child_name =  $v['child_name'] ?? null;
      $u->admin =  $v['admin'];
      $u->specialist =  $v['specialist'];
      $u->save();
    }

    for ($i=1; $i < 60; $i++){
      $u = new User();
      $u->first_name = $f->firstName;
      $u->last_name = $f->lastName;
      $u->email = $f->email;
      $u->password = $pass;
      $u->child_name = $f->name;
      $u->admin = false;
      $u->specialist = false;
      $u->save();
    }

  }
}
