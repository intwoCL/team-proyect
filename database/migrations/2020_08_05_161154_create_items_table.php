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
            $table->string('name',100)->nullable();
            $table->foreignId('content_id')->references('id')->on('contents');
            $table->integer('type')->default(5);
            $table->string('title',100)->nullable();
            $table->longText('body')->nullable();
            $table->string('image')->nullable();
            $table->string('data')->nullable(); //link url, link youtube, audio
            $table->integer('position');
            $table->softDeletes();
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
