<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            // $table->integer('activity_id');
            $table->foreignId('activity_id')->references('id')->on('activities');
            $table->string('name',50);
            $table->string('objective',100)->nullable();
            $table->integer('position');
            $table->integer('items_total')->default(0);
            $table->boolean('quiz');
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
        Schema::dropIfExists('contents');
    }
}
