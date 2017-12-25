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
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullname');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('birthday');
            $table->string('address');
            $table->string('phone');
            $table->longText('need');


            $table->integer('tipster_id')->unsigned();
            $table->foreign('tipster_id')->references('id')->on('regions');
            $table->number('region_id');
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
