<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitySummariesReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_summaries_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('schedule_id')->references('id')->on('schedules');
            $table->foreignId('calendar_id')->references('id')->on('calendars');
            $table->foreignId('activity_id')->references('id')->on('activities');
            $table->integer('evaluation_score')->default(0);
            $table->integer('day_score')->default(0);
            $table->integer('frequency_score')->default(0);
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
        Schema::dropIfExists('activity_summaries_reports');
    }
}
