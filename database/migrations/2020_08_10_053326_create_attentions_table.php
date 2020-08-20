<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attentions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialist_id')->references('id')->on('users');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->text('comment_in',300)->nullable();
            $table->text('comment_out',300)->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('attentions');
    }
}
