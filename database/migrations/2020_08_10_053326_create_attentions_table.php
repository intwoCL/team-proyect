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
            $table->date('attention_date');
            $table->time('attention_time');
            $table->string('comment_in',300)->nullable();
            $table->string('comment_out',300)->nullable();
            $table->enum('status',[1,2,3])->default(1);
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
