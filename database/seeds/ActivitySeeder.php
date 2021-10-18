<?php

use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\ActivitySummary;
use App\Models\Category;
use App\Models\Content;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $f = Faker\Factory::create();

      for ($i=0; $i < 100; $i++) {
        DB::table('activities')->insert(
          [
            'name' =>  $f->text(10) . Str::random(10),
            'objective' => $f->text(200),
            'scale_id' => $f->numberBetween(1,4),
            'user_id' => $i%2 == 0 ? 1 : 2,
            'code' => Str::random(10) . $i,
            'total_time' => 120,
          ]
        );
      }

      $categories = Category::get()->count();
      $acti = Activity::get();

      foreach ($acti as $ac) {
        $ra = $f->numberBetween(1,$categories);
        $acxx = new ActivityCategory();
        $acxx->category_id = $ra;
        $acxx->activity_id = $ac->id;
        $acxx->save();
      }


      $count = 1;
      $activity_id = 1;
      for ($i=0; $i < 500; $i++) {
        $c = new Content();
        $c->activity_id = $activity_id;
        $c->name = $f->text(10);
        $c->objective = $f->text(100);
        $c->position = $count;
        $c->save();

        $count++;
        if($count == 10){
          $count = 1;
          $activity_id++;
        }
      }

      $contents = Content::get();
      foreach ($contents as $c) {
        $interacciones = $f->numberBetween(1,10);
        for ($i=1; $i <= $interacciones; $i++) {
          $this->items($i, $c->id);
        }
      }

    }

    function items($p, $content_id) {
      $f = Faker\Factory::create();

      $i = new Item();
      $i->name = $f->text(10);
      $i->title = $f->text(10);

      $body = $f->boolean();
      $type = $f->numberBetween(1,5);
      $i->type = $type;

      // 1 => 'URL', 2 => 'Video', 3 => 'Imagen', 4 => 'Audio', 5 => 'Texto',
      if($i->type == 1){
        $i->data = $f->imageUrl(300, 300, 'cats');
      }elseif($i->type == 2){
        $i->data = 'https://www.youtube.com/watch?v=kJQP7kiw5Fk';
      }elseif($i->type == 3){
        $i->image = '/images/gallery.jpg';
      }elseif($i->type == 4){
        $i->data = '/assets/test/test.mp3';
        $i->image = $p%2 == 0 ? '/images/gallery.jpg' : null;
      } else{
        $body = true;
      }

      if ($body) {
        $i->body = $f->text(100);
      }

      $i->content_id = $content_id;
      $i->position = $p;
      $i->save();
    }
}
