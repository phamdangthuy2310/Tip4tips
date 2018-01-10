<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullname');
            $table->tinyInteger('gender');
            $table->date('birthday');
            $table->string('address');
            $table->string('phone');
            $table->decimal('point', 8, 0)->default(0);
            $table->decimal('vote', 4,0)->default(0);
            $table->tinyInteger('delete_is')->default(1);

            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');

            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions');

            $table->rememberToken();
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
