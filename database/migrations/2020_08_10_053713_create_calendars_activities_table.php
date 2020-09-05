<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calendar_id')->references('id')->on('calendars');
            $table->foreignId('activity_id')->references('id')->on('activities');
            $table->integer('weekday');
            $table->time('worktime');
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
        Schema::dropIfExists('calendars_activities');
    }
}
