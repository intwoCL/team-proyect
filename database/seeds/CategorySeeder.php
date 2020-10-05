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
        'FEI - Atención Conjunta',
        'FEI - Atención Sostenida',
        'FEI - Planificar',
        'FEI - Funcionalidad de los objetos',
        'Intención Comunicativa',
        'Permanencia del objeto',
        'Relación Causa y Efecto',
        'EC - Nivel de complejidad 1',
        'EC - Nivel de complejidad 2',
        'NI - Imitación con Objeto Concreto',
        'NI - Imitación Motora Gruesa',
        'NI - Imitación Motora Fina',
        'NI - Imitación Oral',
        'NI - Imitación Verbal',
      ];

      foreach ($categories as $key => $value) {
        DB::table('categories')->insert([
          'name' => $value
        ]);
      }
    }
}
