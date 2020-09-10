<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitySummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_activity_id')->references('id')->on('schedules_activities');
            $table->foreignId('content_id')->references('id')->on('contents');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('feedback',500)->nullable();
            $table->integer('store')->default(0);
            $table->date('finished_at')->nullable();
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
        Schema::dropIfExists('activity_summaries');
    }
}
