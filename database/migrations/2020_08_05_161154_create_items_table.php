<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            // $table->integer('content_id');
            $table->foreignId('content_id')->references('id')->on('contents');
            $table->foreignId('type_id')->references('id')->on('types');
            $table->string('title',100);
            $table->longText('content')->nullable();
            $table->integer('position');

            $table->string('video')->nullable();
            $table->string('photo')->default('/images/gallery.jpg');
            $table->string('audio')->nullable();
            $table->string('url')->nullable();

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
        Schema::dropIfExists('items');
    }
}
