<?php

use App\Models\Assignment;
use App\Models\Attention;
use Illuminate\Database\Seeder;

class AttentionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $f = Faker\Factory::create('es_ES');

      $assigments = Assignment::where('specialist_id',2)->get();

      foreach ($assigments as $as) {
        $ns = $f->randomElements(range(1, 28), 15);
        for ($y=0; $y < count($ns) ; $y++) {
          $day = $ns[$y];
          $att = new Attention();
          $att->specialist_id = 2;
          $att->user_id = $as->user_id;
          $att->attention_date = date('Y-m') . '-' . $day;
          $att->attention_time = $f->time('H:i');
          $att->status = $f->numberBetween(1,3);
          $att->comment_in = $y%2 == 0 ? $f->text : null;
          if ($att->status == 2) {
            $att->comment_out = $f->text;
          }
          $att->save();
        }
      }
    }
}
