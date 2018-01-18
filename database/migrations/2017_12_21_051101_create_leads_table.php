<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->tinyInteger('gender')->nullable();
            $table->date('birthday')->default('1900-01-01');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->longText('need');
            $table->tinyInteger('status')->default(0);


            $table->integer('tipster_id')->unsigned();
            $table->foreign('tipster_id')->references('id')->on('users');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions');
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
        Schema::dropIfExists('leads');
    }
}
