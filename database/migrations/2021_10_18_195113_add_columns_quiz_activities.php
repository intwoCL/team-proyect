<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsQuizActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->boolean('evaluation_quiz_enabled')->nullable()->default(false);
            $table->boolean('day_quiz_enabled')->nullable()->default(false);
            $table->boolean('frequency_quiz_enabled')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn(['evaluation_quiz_enabled','day_quiz_enabled','frequency_quiz_enabled']);
        });
    }
}
