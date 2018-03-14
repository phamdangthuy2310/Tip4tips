<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsSentMessageTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_sent_message_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message_id')->nullable();
            $table->integer('sender_id')->nullable();
            $table->integer('receiver_id')->nullable();
            $table->string('subject')->nullable();
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('logs_sent_message_templates');
    }
}
