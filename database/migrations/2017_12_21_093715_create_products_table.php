<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->decimal('price', 8, 0)->default(0);
            $table->binary('thumbnail')->nullable();;
            $table->decimal('quality', 8, 0)->default(0);

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('productcategories');
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
        Schema::dropIfExists('products');
    }
}
