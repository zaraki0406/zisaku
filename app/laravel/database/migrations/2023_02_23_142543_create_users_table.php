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
            $table->bigIncrements('id');
            $table->string('name','10');
            $table->string('email','30');
            $table->string('password','100');
            $table->string('image','100')->nullable();
            $table->string('profile','300')->nullable();
            $table->string('height','10')->nullable();
            $table->string('target‗weight','10')->nullable();
            $table->tinyInteger('role');
            $table->boolean('del_flg')->default(false);
            $table->timestamps();
            $table->string('user_tokens','30')->nullable();
            $table->tinyInteger('gender');
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
