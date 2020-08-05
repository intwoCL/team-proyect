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
            $table->uuid('uuid')->unique();
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('nickname',50)->unique();
            $table->string('email',150)->unique();
            $table->string('password',64);
            $table->boolean('admin')->default(false);
            $table->string('run',12)->unique();
            $table->string('photo')->default("/img/img-default-user.jpg");
            $table->string('lang',3)->default('es');
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
