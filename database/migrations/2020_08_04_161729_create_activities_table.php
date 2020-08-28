<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('objective',100)->nullable();
            $table->string('photo')->default('/images/gallery.jpg');
            $table->foreignId('scale_id')->references('id')->on('scales');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('code')->unique();
            $table->integer('status')->default(1);
            $table->integer('total_content')->default(0);
            $table->integer('total_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
