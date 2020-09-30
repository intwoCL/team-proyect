<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email',150)->unique();
            $table->string('password',64);
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('child_name',100)->nullable();
            $table->integer('gender')->default(0);
            $table->string('lang',3)->default('es');
            $table->json('account_token')->nullable();
            $table->boolean('admin')->default(false);
            $table->boolean('specialist')->default(false);
            $table->string('specialty',100)->nullable();
            $table->string('photo')->default("/images/avatar.png");
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
        Schema::dropIfExists('users');
    }
}
